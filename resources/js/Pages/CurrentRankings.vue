<template>
  <div class="min-h-screen bg-zinc-600 p-4 text-white font-fontbase">
    <h1 class="text-2xl font-bold mb-4">Leaderboard</h1>
    
    <div class="bg-zinc-500 rounded-full p-2 inline-block mb-6">
      <button class="px-3 py-1 rounded-full" :class="{'bg-white text-zinc-600': currentTab === 'week'}" @click="currentTab = 'week'">This week</button>
      <button class="px-3 py-1 rounded-full" :class="{'bg-white text-zinc-600': currentTab === 'allTime'}" @click="currentTab = 'allTime'">All time</button>
    </div>

    <div class="flex justify-between items-end mb-6">
      <div class="flex flex-col items-center w-1/3">
        <div class="w-16 h-16 bg-gray-300 rounded-full mb-2 overflow-hidden">
          <img :src="getProfilePhotoUrl(ranking.entries[1].user.profile_photo)" alt="Foto del profilo">
        </div>
        <span class="text-sm font-semibold font-secondary">{{ ranking.entries[1].user.name }}</span>
        <div class="bg-gray-200 w-full h-24 rounded-t-lg mt-2 flex items-end justify-center">
          <span class="mb-2 font-bold">{{ ranking.entries[1].points }}</span>
        </div>
      </div>
      
      <div class="flex flex-col items-center w-1/3">
        <div class="w-20 h-20 bg-yellow-300 rounded-full mb-2 overflow-hidden border-4 border-white">
          <img :src="getProfilePhotoUrl(ranking.entries[0].user.profile_photo)" alt="Foto del profilo">
        </div>
        <span class="text-sm font-semibold font-secondary">{{ ranking.entries[0].user.name }}</span>
        <div class="bg-yellow-300 w-full h-32 rounded-t-lg mt-2 flex items-end justify-center">
          <span class="mb-2 font-bold">{{ ranking.entries[0].points }}</span>
        </div>
      </div>
      
      <div class="flex flex-col items-center w-1/3">
        <div class="w-16 h-16 bg-orange-300 rounded-full mb-2 overflow-hidden">
          <img :src="getProfilePhotoUrl(ranking.entries[2].user.profile_photo)" alt="Foto del profilo">>
        </div>
        <span class="text-sm font-semibold font-secondary">{{ ranking.entries[2].user.name }}</span>
        <div class="bg-orange-300 w-full h-20 rounded-t-lg mt-2 flex items-end justify-center">
          <span class="mb-2 font-bold">{{ ranking.entries[2].points }}</span>
        </div>
      </div>
    </div>

    <div class="space-y-2">
      <div v-for="entry in ranking.entries.slice(3)" :key="entry.id" class="flex items-center bg-zinc-500 rounded-lg p-3">
        <span class="w-8 text-center">{{ entry.position }}</span>
        <div class="w-10 h-10 rounded-full overflow-hidden mx-3">
          <img :src="getProfilePhotoUrl(entry.user.profile_photo)" alt="Foto del profilo">
        </div>
        <span class="flex-grow font-semibold font-secondary">{{ entry.user.name }}</span>
        <span class="font-bold">{{ entry.points }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    ranking: Object
  },
  data() {
    return {
      currentTab: 'week'
    }
  },
  methods: {
    getProfilePhotoUrl(profilePhoto) {
      if (!profilePhoto) return null;
      // Assumendo che l'URL base del tuo sito sia accessibile globalmente
      // Altrimenti, potresti dover configurare questo valore in modo diverso
      const baseUrl = window.location.origin;
      return `${baseUrl}/${profilePhoto}`;
    }
  }
}
</script>