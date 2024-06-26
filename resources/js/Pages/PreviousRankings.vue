<template>
    <div>
      <h1>Classifiche Precedenti</h1>
      <div v-for="ranking in rankings" :key="ranking.id">
        <h2>Settimana {{ ranking.week }} - Anno {{ ranking.year }}</h2>
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
    </div>
  </template>
  
  <script>
  export default {
    props: {
      rankings: Array
    }
  }
  </script>