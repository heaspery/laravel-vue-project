<script setup>
import { useFetchJson } from '../composables/useFetchJson';
import TheConnectedHeader from '@/Components/TheConnectedHeader.vue';
import { router } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';

const { data: stories, error: storiesError, loading: storiesLoading } = useFetchJson('/api/v1/stories');

function displayStory(id) {
  router.visit(`/story/${id}`);
}

</script>


<template>
    <TheConnectedHeader/>
    <Head title="Les Histoires" />
    <div id="storyList" class="p-6">
        <div v-if="storiesLoading">Chargement...</div>
        <div v-else-if="storiesError">Erreur : {{ storiesError.statusText }}</div>
        <div v-else>
            <div v-for="story in stories" :key="story.id" class="cursor-pointer hover:bg-lime-500 hover:text-white active:bg-lime-500 actives:text-white p-4 border border-lime-500 rounded-md "
                @click="displayStory(story.id)">
                <h2 class="text-xl fnt-semibold">{{ story.title }}</h2>
                <p>{{ story.description }}</p>
            </div>
        </div>
    </div>

</template>
