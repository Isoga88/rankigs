<template>
    <div>
      <h1>Classifica Corrente</h1>
      <table>
        <thead>
          <tr>
            <th>Posizione</th>
            <th>Nome</th>
            <th>Punti</th>
          </tr>
        </thead>
        <tbody>
          {{ ranking }}
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