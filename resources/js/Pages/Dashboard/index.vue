<template>
	<div>
		<h1>Hello Vue Component are here</h1>
		<p>My Name is {{name}} and my Deggree is {{degree}}</p>
	</div>
</template>

<script>
	export default {
		props:['name','degree']
	}
</script>