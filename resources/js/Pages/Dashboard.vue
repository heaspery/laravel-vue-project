<script setup>
import { ref } from 'vue';
import { useFetchJson } from '../composables/useFetchJson';
import DropdownLink from '@/Components/DropdownLink.vue';
import { router } from '@inertiajs/vue3';

const { data: stories, error: storiesError, loading: storiesLoading } = useFetchJson('/api/stories');

function displayStory(id) {
  router.visit(`/story/${id}`);
}

</script>


<template>
    <DropdownLink :href="route('logout')" method="post" as="button">
        Log Out
    </DropdownLink>

    <div id="storyList" class="p-6">
        <div v-if="storiesLoading">Chargement...</div>
        <div v-else-if="storiesError">Erreur : {{ storiesError.statusText }}</div>
        <div v-else>
            <div v-for="story in stories" :key="story.id" class="cursor-pointer hover:bg-gray-100 p-4 border"
                @click="displayStory(story.id)">
                <h2 class="text-xl fnt-semibold">{{ story.title }}</h2>
                <p>{{ story.description }}</p>
            </div>
        </div>
    </div>

</template>
