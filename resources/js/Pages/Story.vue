<script setup>
import { ref, watchEffect, watch } from 'vue';

const props = defineProps({ story: Object });

const currentChapterId = ref(1);
const currentChapterData = ref(null);
const choices = ref([]);
const choicesLoading = ref(false);
const choicesError = ref(null);
const chapters = ref([]);
const chaptersLoading = ref(false);
const chaptersError = ref(null);

// Fonction pour charger tous les chapitres
async function fetchChapters(storyId) {
    try {
        chaptersLoading.value = true;
        const res = await fetch(`/api/stories/${storyId}/chapters`);
        if (!res.ok) throw new Error(`Erreur HTTP ${res.status}`);
        chapters.value = await res.json();
        chaptersError.value = null;
    } catch (err) {
        chaptersError.value = err;
        chapters.value = [];
    } finally {
        chaptersLoading.value = false;
    }
}

// Fonction pour charger les données d’un chapitre
async function fetchChapter(chapterId) {
    const res = await fetch(`/api/chapters/${chapterId}`);
    if (!res.ok) throw new Error(`Erreur HTTP ${res.status}`);
    return await res.json();
}

// Fonction pour charger les choix d’un chapitre
async function fetchChoices(chapterId) {
    try {
        choicesLoading.value = true;
        const res = await fetch(`/api/chapters/${chapterId}/choices`);
        if (!res.ok) throw new Error(`Erreur HTTP ${res.status}`);
        choices.value = await res.json();
        choicesError.value = null;
    } catch (err) {
        choicesError.value = err;
        choices.value = [];
    } finally {
        choicesLoading.value = false;
    }
}

// Quand l’histoire change, on recharge tout depuis le premier chapitre
watch(() => props.story.id, async (newStoryId) => {
    currentChapterId.value = 1;
    await fetchChapters(newStoryId);
    currentChapterData.value = await fetchChapter(currentChapterId.value);
    await fetchChoices(currentChapterId.value);
});

// Initialisation au montage
fetchChapters(props.story.id);
fetchChapter(currentChapterId.value).then(data => currentChapterData.value = data);
fetchChoices(currentChapterId.value);

// Quand l’ID du chapitre change (ex: clic sur un choix)
watchEffect(async () => {
    if (!currentChapterId.value) return;
    try {
        currentChapterData.value = await fetchChapter(currentChapterId.value);
        await fetchChoices(currentChapterId.value);
    } catch (e) {
        console.error("Erreur lors du chargement du chapitre ou des choix", e);
    }
});

// Gérer le clic sur un choix
async function handleChoice(choiceId) {
    try {
        const res = await fetch(`/api/choices/${choiceId}`);
        if (!res.ok) throw new Error(`Erreur HTTP ${res.status}`);
        const data = await res.json();
        currentChapterId.value = data.next_chapter_id;
    } catch (err) {
        console.error("Erreur lors de la sélection du choix :", err);
    }
}

async function restartStory() {
    currentChapterId.value = 1;
    try {
        currentChapterData.value = await fetchChapter(currentChapterId.value);
        await fetchChoices(currentChapterId.value);
    } catch (err) {
        console.error("Erreur lors du redémarrage de l’histoire", err);
    }
}
</script>



<template>
    <div id="story" class="p-6">
        <h1 class="text-3xl font-bold mb-4">{{ story.title }}</h1>
        <p class="text-lg">{{ story.description }}</p>
        <button @click="restartStory" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            🔄 Recommencer l’histoire
        </button>
    </div>


    <div id="chapterView" class="p-6">
        <div v-if="chaptersLoading">Chargement...</div>
        <div v-else-if="chaptersError">Erreur : {{ chaptersError.message }}</div>
        <div v-else-if="!currentChapterData">Chargement du chapitre...</div>
        <div v-else class="cursor-pointer hover:bg-gray-100 p-4 border">
            <h2 class="text-xl font-semibold">{{ currentChapterData.title }}</h2>
            <p>{{ currentChapterData.content }}</p>
        </div>
    </div>

    <div id="choices" class="p-6">
        <div v-if="choicesLoading">Chargement des choix...</div>
        <div v-else-if="choicesError">Erreur : {{ choicesError.message }}</div>
        <div v-else>
            <div v-for="choice in choices" :key="choice.id" class="cursor-pointer hover:bg-gray-100 p-4 border"
                @click="handleChoice(choice.id)">
                <h2 class="text-xl font-semibold">{{ choice.content }}</h2>
            </div>
        </div>
    </div>
</template>