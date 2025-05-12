<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Link
        :href="href"
        class="block w-full px-4 py-2 text-end text-sm leading-5 text-white-100 transition duration-150 ease-in-out hover:text-lime-500 focus:btext-lime-500 focus:outline-none"
    >
        <slot />
    </Link>
</template>
