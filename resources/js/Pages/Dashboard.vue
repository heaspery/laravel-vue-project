<script setup>
import { Head } from '@inertiajs/vue3';
import TheStoriesList from '@/Components/TheStoriesList.vue';
import TheStory from '@/Components/TheStory.vue';

import DropdownLink from '@/Components/DropdownLink.vue';
import { getStories, getStoryChoices,  } from '@/utils/api';
import { onMounted, ref } from 'vue';

const stories = [];
const storyChoices = [];


onMounted(async () => {
    stories.value = await getStories();
    console.log(stories.value);
    storyChoices.value = await getStoryChoices(1);
    console.log(storyChoices.value);
});

</script>

<template>
    <DropdownLink :href="route('logout')" method="post" as="button">
        Log Out
    </DropdownLink>

    <div class="p-6">
        <h1 class="text-3xl font-bold mb-4">Le Trésor des Abîmes</h1>
        <p>Bienvenue dans l’aventure !</p>

        <div v-for="story in stories" :key="story.id" class="mb-4">
            <h2 class="text-xl font-semibold">{{ story.title }}</h2>
            <p>{{ story.description }}</p>
            <button action=""></button>
        </div>
    </div>

    <h2>Voici l'histoire</h2>

</template>
