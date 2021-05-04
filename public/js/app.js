var vm = new Vue({
	el: '#app-nav',			
	data() {
		return {			
			view: {
				menu: false,
				mobileMenu: false
			},			
			windowWidth: window.innerWidth,
			txt: ''
		}
	},
	mounted() {
		this.$nextTick(() => {
			window.addEventListener('resize', this.onResize);
		})
	},
	computed: {
		isMobileView() {
			if (this.windowWidth <= 576) {
				return true;
			}
			return false;
		}
	},
	beforeDestroy() { 
		window.removeEventListener('resize', this.onResize); 
	},
	methods: {
		onResize() {
      		this.windowWidth = screen.width;
    	}
	},
	watch: {
		windowWidth(newWidth, oldWidth) {
			this.txt = `it changed to ${newWidth} from ${oldWidth}`;
		}
	},
});

var vmApp = new Vue({
	el: '#app',
	data() {
		return {
			msg: 'Welcome to webstart template',
		}
	}
})