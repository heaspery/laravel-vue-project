<script setup>
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TheConnectedHeader from '@/Components/TheConnectedHeader.vue';
import TheTitle from '@/Components/TheTitle.vue';


const chapterId = ref(null);
const currentChapter = ref(null);
const choices = ref([]);

const props = defineProps({
    story: Object,  
});

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
    <TheConnectedHeader/>
    <Head title="Lecture"/>

        <a href="/dashboard" class="p-5 m-5 flex flex-row gap-2 hover:text-lime-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-undo2-icon lucide-undo-2"><path d="M9 14 4 9l5-5"/><path d="M4 9h10.5a5.5 5.5 0 0 1 5.5 5.5a5.5 5.5 0 0 1-5.5 5.5H11"/></svg>
        <h3 class="font-bold">Retour</h3>
        </a>

    <div id="storyDescription" class="p-6 flex flex-col items-center">
        <TheTitle>{{ props.story.title }}</TheTitle>
        <p class="text-center  font-bold">{{ props.story.description }}</p>
    </div>
    <div v-if="currentChapter" id="chapter" class="p-6">
        <h2 class="text-2xl font-bold mb-4 text-blue-900 mt-12 text-center">{{ currentChapter.title }}</h2>
        <p class="text-center">{{ currentChapter.content }}</p>
    </div>
    <div v-else>Chargement...</div>
    <div id="choices" v-if="choices.length>0" class="mb-8">
        <ul class="p-6 flex flex-col items-center">
            <li v-for="choice in choices" :key="choice.id" class="p-2">
                <button @click="displayNext(choice.next_chapter_id)"  class="p-2 border border-lime-500 rounded-md hover:bg-lime-500 hover:text-white active:bg-lime-500 active:text-white-100">
                    {{ choice.content }}
                </button>
            </li>
        </ul>
    </div>
    <div v-else class="p-6 flex flex-col items-center">
        <h2 class="p-2">Fin de l'histoire</h2>
        <PrimaryButton @click="startOver()">Recommencer</PrimaryButton>
    </div>
</template>