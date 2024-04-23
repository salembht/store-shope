<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import productList from './productList.vue';
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Products" /> 
        <main>
            <productList>

         </productList>
        </main>
        
    </AuthenticatedLayout>
</template>