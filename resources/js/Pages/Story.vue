<script setup>
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';

const chapterId = ref();
const currentChapter = ref(null);
const choices = ref([]);

const props = defineProps({
    story: Object,  
});


async function fetchChapter(chapterId) {
    const data = await fetch(`/api/chapters/${chapterId}`);
    const chapter = await data.json();
    return chapter;
}

async function fetchChoices(chapterId) {
    const data = await fetch(`/api/chapters/${chapterId}/choices`);
    if (data.length === 0) {
        return [];
    } else {
        const choices = await data.json();
        return choices;
    }
}

async function displayNext(nextChapterId) {
    currentChapter.value = await fetchChapter(nextChapterId);
    choices.value = await fetchChoices(currentChapter.value.id);
    await setProgress(currentChapter.value.id);
}

async function startOver(){
    currentChapter.value = await fetchChapter(1);
    choices.value = await fetchChoices(currentChapter.value.id);
    await setProgress(1);
}

onMounted(async () => {
    const progress = await getProgress();

    if (progress) {
        chapterId.value = progress;
    } else {
        chapterId.value = 1;
    }

    currentChapter.value = await fetchChapter(chapterId.value);
    choices.value = await fetchChoices(currentChapter.value.id);

});

async function getProgress() {
    const progress = localStorage.getItem(`progres${props.story.id}`);
    if (progress) {
        return JSON.parse(progress);
    } else {
        return null;
    }
}

async function setProgress(chapterId) {
    localStorage.setItem(`progres${props.story.id}`, JSON.stringify(chapterId));
}

</script>



<template>
    <Head title={{ props.story.title }} />
    <div id="storyDescription" class="p-6">
        <h1>{{ props.story.title }}</h1>
        <p>{{ props.story.description }}</p>
    </div>
    <div v-if="currentChapter" id="chapter" class="p-6">
        <h2>{{ currentChapter.title }}</h2>
        <p>{{ currentChapter.content }}</p>
    </div>
    <div v-else>Chargement...</div>
    <div id="choices" v-if="choices.length>0" class="p-6">
        <ul>
            <li v-for="choice in choices" :key="choice.id">
                <button @click="displayNext(choice.next_chapter_id)">
                    {{ choice.content }}
                </button>
            </li>
        </ul>
    </div>
    <div v-else class="p-6">
        <h2>Fin de l'histoire</h2>
        <button @click="startOver()">Recommencer</button>
    </div>
</template>