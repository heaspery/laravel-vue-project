<script setup>
import TheHeader from '@/Components/TheHeader.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';


</script>

<template>
  <Head title="Accueil" />
  <TheHeader />
  <div class="p-6 flex flex-col items-center text-center">
    <div id="hero" class="flex flex-col items-center text-center">
      <h1 class="text-5xl font-bold mb-4 text-blue-900 mt-12">
        Bienvenue dans l’aventure !
      </h1>
      <div class="max-w-96 pt-12">
        <img id="image" class="object-fill rounded-md"
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/CH.SG.St-Gallen_2023-11-15_Abbey-Library-of-Saint-Gall_3728_4x3-R_11K.jpg/1200px-CH.SG.St-Gallen_2023-11-15_Abbey-Library-of-Saint-Gall_3728_4x3-R_11K.jpg"
          alt="Bibliothèque de Saint-Gall">
        <label for="image">Bibliothèque de Saint-Gall · Wikipedia </label>
      </div>
    </div>
    <div>
      <p class="max-w-md text-lg text-gray-800 mt-8 mb-8">
        Sur ce site, vous aurez la possibilité de vous plonger dans de multiples histoires dont vous êtes le héros.
        Alors ne tardez pas plus, et démarrez une nouvelle aventure !
      </p>
    </div>
    <a href="./dashboard">
   <PrimaryButton>Commencer un histoire</PrimaryButton>
  </a>
  </div>
</template>
