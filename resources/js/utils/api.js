import { fetchJson } from "./fetchJson";

async function getStories(){
        const {request}  = await fetchJson({
            url: '/api/stories',
            method: 'GET',
        })

        return await request; 
}

async function getChoices(){
    const {request}  = await fetchJson({
        url: '/api/choices',
        method: 'GET',
    })

    return await request; 
}

async function getStory(id){
    const {request}  = await fetchJson({
        url: `/api/stories/${id}`,
        method: 'GET',
    })

    return await request; 
}

async function getStoryChoices(id){ 
    const {request}  = await fetchJson({
        url: `/api/stories/${id}/chapters`,
        method: 'GET',
    })

    return await request; 
}

async function getCurrentUser(){
    const {request}  = await fetchJson({
        url: '/api/user',
        method: 'GET',

    })
    return await request; 
}



export { getStories, getChoices, getStory, getStoryChoices, getCurrentUser};