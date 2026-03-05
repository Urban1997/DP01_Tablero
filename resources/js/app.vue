<template>
  <div class="flex flex-col min-h-screen">

    <Header />

    <main class="flex-1 p-6 bg-white">
      <router-view />
    </main>

    <Footer />

  </div>
</template>

<script setup>
import Header from './layouts/Header.vue'
import Footer from './layouts/Footer.vue'
</script>
