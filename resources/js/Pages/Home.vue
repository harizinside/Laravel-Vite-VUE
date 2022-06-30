<template>
    <Head title="Home">
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <meta name="description" content="This is my about page description" />
    </Head>
    <div>
        <h1 class="text-3xl font-bold underline">Inertiajs is {{ test }}</h1>
        <Link href="/about-us">Go to about us</Link>
    </div>
</template>

<script>
import { Link, Head } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link,
        Head,
    },
    props: ["test"],
};
</script>
