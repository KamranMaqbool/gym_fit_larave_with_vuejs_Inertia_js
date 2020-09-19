<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="co-md-12">
                    <h1>Hello Vue Component are here</h1>
                    <p>My Name is {{name}} and my Deggree is {{degree}}</p>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
export default {
    props: ['name', 'degree'],
    components: {
        Layout
    }
}

</script>
