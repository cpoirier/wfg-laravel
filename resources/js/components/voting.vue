<template>
  <span class="votingElements">
    <p>
      <span class="voteTitle">Votes</span>
        <span class="vote uvote" v-on:click="sendVote('up')">{{nup_votes}} ▲</span>
        <span class="vote dvote" v-on:click="sendVote('down')">{{ndown_votes}} ▽</span>
    </p>
  </span>
</template>

<script>
  export default {
    mounted() {
      console.log("Voting mounted.")
    },
    props: ["up_votes", "down_votes"],
    methods: {
      sendVote: function(vType) {
        if(vType === "up") {
          this.upV = parseInt(this.upV) + 1;
          this.lastVote = this.upV
        }
        if(vType === "down") {
          this.downV = parseInt(this.downV) + 1;
          this.lastVote = this.downV;
        }
      }
    },
    data() {
      return {
        upV: this.up_votes,
        downV: this.down_votes,
        lastVote: 0,
      };
    },
    computed: {
      nup_votes: function() { return this.upV; },
      ndown_votes: function() { return this.downV; }
    }
  }
</script>

<style>
.votingElements {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
</style>