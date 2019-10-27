set @for_seed = 1;


-- users

select
     id                  as id
   , trim(user_login)    as name
   , trim(user_nicename) as slug
   , if(@for_seed, concat('test+', id, '@webfictionguide.com'), user_email) as email
   , user_registered     as email_verified_at
   , if(@for_seed, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '') as password
   , user_registered     as created_at
from wp_wfg_users u
where (
        exists (select * from wp_wfg_opinions o where o.member_id = u.id)
     or exists (select * from bb_posts p where p.poster_id = u.id)
     or exists (select * from wp_wfg_listings l where l.author_id = u.id)
  )
  and not exists (select * from wp_wfg_usermeta where meta_key = 'wp_wfg_capabilities' and meta_value like '%"banned"%' and user_id = u.id)
order by id
;


-- listings

select
    ID as id
  , post_title as title
  , author_name as author_name
  , if(author_id > 0, author_id, 3) as user_id
  , if(author_id > 0, 1, 0) as user_is_author
  , post_name as slug
  , tagline as tagline
  , post_content as blurb
  , case update_frequency when -10 then 'gone' when -2 then 'abandoned' when -1 then 'complete' else 'ongoing' end as status
  , case graphic_sex when 8 then 'pervasive' when 4 then 'some' else 'none' end as graphic_sex
  , case graphic_violence when 8 then 'pervasive' when 4 then 'some' else 'none' end as graphic_violence
  , case harsh_language when 8 then 'pervasive' when 4 then 'some' else 'none' end as harsh_language
  , link as story_home_url
  , link as first_page_url
  , post_date_gmt as created_at
  , post_modified_gmt as updated_at
  , substring(soundex(post_title), 1, 4) as title_soundex
  , substring(soundex(author_name), 1, 4) as author_soundex
from wp_wfg_full_listings
where update_frequency > -10
;


-- listing_tags

select t.term_id as id, t.`name` as name, t.`slug`
from wp_wfg_terms t
join wp_wfg_term_taxonomy x on x.term_id = t.term_id
where x.taxonomy = 'post_tag'
;


-- listing_tag_sets

select l.listing_id, x.term_id as tag_id
from wp_wfg_term_relationships r
join wp_wfg_term_taxonomy x on r.term_taxonomy_id = x.term_taxonomy_id and x.taxonomy = 'post_tag'
join wp_wfg_terms s on x.term_id = s.term_id
join (select ID as listing_id from wp_wfg_full_listings where update_frequency > -10) l on l.listing_id = r.object_id
;


update listing_tags t
set count = (SELECT count(*) from listing_tag_sets s where s.tag_id = t.id)
;

update listings l
set up_votes = (select count(*) from listing_votes v where v.listing_id = l.id and vote = 1),
    down_votes = (select count(*) from listing_votes v where v.listing_id = l.id and vote = -1)
;




-- listing_votes

select
     member_id as user_id
   , listing_id
   , if(recommended or rating >= 4.0, 1, -1) as vote
from wp_wfg_opinions o
where o.recommended = 1 or o.rating >= 4.0 or o.rating <= 2.5
;


-- reviews

select
  r.`ID` AS `id`,
  a.`ID` AS `user_id`,
  o.listing_id as listing_id,
  r.`post_date` AS `created_at`,
  r.`post_date` AS `updated_at`,
  r.`post_title` as `title`,
  r.`post_content` AS `text`,
  l.post_title as listing_title_when_reviewed,
  l.author_name as listing_author_when_reviewed
from `wp_wfg_posts` r
join `wp_wfg_users` a on r.`post_author` = a.`ID`
join wp_wfg_opinions o on r.id = o.review_id
join `wp_wfg_full_listings` l on o.listing_id = l.listing_id
where ((r.`post_type` = 'review') or (r.`post_type` = 'note'))
;


-- review_votes

select
     user_id
   , post_id as review_id
   , if(recommended = 1, 1, -1) as vote
from wp_wfg_recommendations r
;

update reviews r
set up_votes = (select count(*) from review_votes v where v.review_id = r.id and vote = 1),
    down_votes = (select count(*) from review_votes v where v.review_id = r.id and vote = -1)
;


-- forums

select
    forum_id as id
  , forum_name as title
  , forum_slug as slug
  , (select sum(topics) from bb_forums t where t.forum_id = f.forum_id or t.forum_parent = f.forum_id) as topic_count
  , (select sum(posts) from bb_forums t where t.forum_id = f.forum_id or t.forum_parent = f.forum_id) as post_count
from bb_forums f
where forum_parent = 0
;


-- forum_topics

select
    topic_id as id
  , topic_title as title
  , topic_slug as slug
  , (select if(f.forum_parent > 0, f.forum_parent, f.forum_id) from bb_forums f where f.forum_id = t.forum_id) as forum_id
  , topic_poster as poster_id
  , topic_open       as is_open
  , topic_start_time as created_at
  , topic_time       as updated_at
  , (select min(post_id) from bb_posts p where p.topic_id = t.topic_id) as first_post_id
  , topic_last_post_id as last_post_id
  , topic_posts as post_count
from bb_topics t
;


-- forum_posts

select
     post_id as id
   , topic_id as topic_id
   , poster_id as poster_id
   , post_text as text
   , post_time as created_at
   , if(post_status = 1, post_time, null) as deleted_at
from bb_posts p
;


-- forum_topic_tags

select
     tag_id as id
   , raw_tag as tag
   , tag as slug
from bb_tags
where length(tag) <= 30
;


-- forum_topic_tag_sets

select t.topic_id, x.term_id as tag_id
from bb_term_relationships r
join bb_term_taxonomy x on r.term_taxonomy_id = x.term_taxonomy_id and x.taxonomy = 'bb_topic_tag'
join bb_terms s on x.term_id = s.term_id
join bb_topics t on t.topic_id = r.object_id
where length(s.name) <= 30
order by t.topic_id, x.term_id
;



-- user points

insert into user_points (user_id, reason_code, subject_id, added_at, expires_at, points)
select user_id, 'listing', id, created_at, created_at + interval 1 year, 175
from listings
where user_is_author = 1
;

insert into user_points
(user_id, reason_code, subject_id, added_at, expires_at, points)
select poster_id, 'forum_post', id, created_at, created_at + interval 1 year, 10
from forum_posts
where deleted_at is null
;

insert into user_points
(user_id, reason_code, subject_id, added_at, expires_at, points)
select user_id, 'review', id, created_at, created_at + interval 1 year, 100
from reviews
;

insert into user_points
(user_id, reason_code, subject_id, added_at, expires_at, points)
select user_id, 'listing_vote', id, created_at, created_at + interval 1 year, 20
from listing_votes
;

update users u
set points_total = (select sum(p.points) from user_points p where p.user_id = u.id and expires_at > now()), points_as_of = now()
;

