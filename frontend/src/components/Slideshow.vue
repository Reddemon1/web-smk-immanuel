<template>
	<div>
		<div class="slider">
			<div class="content">
				<img v-if="window > 768" src="@/assets/images/banner/1920 x 600/banner-1.jpg" class="banner-img" alt="Banner">
				<img v-if="window > 768" src="@/assets/images/banner/1920 x 600/banner-2.jpg" class="banner-img" alt="Banner">
				<img v-if="window > 768" src="@/assets/images/banner/1920 x 600/banner-3.jpg" class="banner-img" alt="Banner">

				<img v-if="window <= 768 && window > 375" src="@/assets/images/banner/1280 x 700/banner-1.jpg" class="banner-img" alt="Banner">
				<img v-if="window <= 768 && window > 375" src="@/assets/images/banner/1280 x 700/banner-2.jpg" class="banner-img" alt="Banner">
				<img v-if="window <= 768 && window > 375" src="@/assets/images/banner/1280 x 700/banner-3.jpg" class="banner-img" alt="Banner">

				<img v-if="window <= 375" src="@/assets/images/banner/1080 x 1080/banner-1.jpg" class="banner-img" alt="Banner">
				<img v-if="window <= 375" src="@/assets/images/banner/1080 x 1080/banner-2.jpg" class="banner-img" alt="Banner">
				<img v-if="window <= 375" src="@/assets/images/banner/1080 x 1080/banner-3.jpg" class="banner-img" alt="Banner">
			</div>
		</div>
	</div>
</template>

<script scoped>
import axios from 'axios'

export default {
	data() {
		return {
			banners: '',
			window: screen.width
		}
	},
	methods: {
		getBanner() {
			axios.get(`banner`)
				.then(res => {
					this.banners = res.data;
				})
				.catch(err => {
					console.log(err.response.data);
				})
		}
	},
	created() {
		this.getBanner();

		window.addEventListener('resize', e => {
			this.window = screen.width;
		});
	},
	mounted() {
		const container = document.querySelector('.content');
		const banners = document.querySelectorAll('.banner-img');

		let max = banners.length - 1;
		let i = 0;

		move();
		function move() {
			container.style.transform = `translateX(${banners[i].clientWidth * -i}px)`;

			i++;

			if (i > max) i = 0;

			setTimeout(move, 5000);
		}
	}
}
</script>

<style scoped>

.slider {
	overflow: hidden;
}

.content {
	display: flex;
	transition: .5s;
}

</style>