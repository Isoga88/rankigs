<template>
    <div class="h-screen flex flex-col items-center justify-center w-full bg-amber-400">
      <h1 class=" text-6xl font-medium ">Classifica Corrente</h1>
      <table>
        <thead>
          <tr>
            <th>Posizione</th>
            <th>Nome</th>
            <th>Punti</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="entry in ranking.entries" :key="entry.id">
            <td>{{ entry.position }}</td>
            <td>{{ entry.user.name }}</td>
            <td>{{ entry.points }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      ranking: Object
    }
  }
  </script>