<script setup>
import { ref } from 'vue';
import { useFetchJson } from '../composables/useFetchJson';
import DropdownLink from '@/Components/DropdownLink.vue';

const { data: stories, error: storiesError, loading: storiesLoading } = useFetchJson('/api/stories');
const selectedStory = ref(null);
const chapters = ref(null);
const choices = ref(null);
const chapterId = ref(1);

// Fonction pour sélectionner une histoire
async function fetchStory(storyId) {
    const data = await fetch(`/api/stories/${storyId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    selectedStory.value = data;

}

async function fetchChapters(storyId) {
    const data = await fetch(`/api/stories/${storyId}/chapters`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
        chapters.value = data;
}

async function displayChoices(chapterId) {
    const data = await fetch(`/api/chapters/${chapterId}/choices`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
        choices.value = data;
}

async function displayStory(storyId) {
    await fetchChapters(storyId);
    await fetchStory(storyId);
    await displayChoices(chapterId.value);

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

    <div id="storyDisplay" class="p-6">
        <div v-if="selectedStory" class="p-6 border-t mt-4">
            <h3 class="text-lg font-bold text-indigo-600">Histoire sélectionnée :</h3>
            <p class="text-xl">{{ selectedStory.title }}</p>
        </div>
        <div v-if="chapters" class="p-6 border-t mt-4">
            <h3 class="text-lg font-bold text-indigo-600">{{ chapters[chapterId].title }}</h3>
            <p class="text-xl">{{ chapters[chapterId].content }}</p>
        </div>
        <div v-if="chapters" class="p-6 border-t mt-4">
            <h3 class="text-lg font-bold text-indigo-600">Choix :</h3>
            <ul>
                <li v-for="choice in choices" :key="choice.id" class="cursor-pointer hover:bg-gray-100 p-4 border"
                    @click="displayChoices(chapterId)">
                    <p>{{ choice.content }}</p>
                </li>
            </ul>
            </div>
    </div>


</template>
