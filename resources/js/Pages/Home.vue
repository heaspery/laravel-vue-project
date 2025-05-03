<template>
    <div class="p-6">
      <h1 class="text-3xl font-bold mb-4">Le Trésor des Abîmes</h1>
      <p>Bienvenue dans l’aventure !</p>
  
      <div v-if="chapters.length" class="mt-6 space-y-4">
        <div
          v-for="chapter in chapters"
          :key="chapter.id"
          class="border p-4 rounded-lg shadow"
        >
          <h2 class="text-xl font-semibold">{{ chapter.title }}</h2>
          <p>{{ chapter.content }}</p>
  
          <ul class="mt-2 list-disc pl-5">
            <li v-for="choice in chapter.choices" :key="choice.id">
              {{ choice.content }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  defineProps({
    chapters: Array
  });
  </script>
  