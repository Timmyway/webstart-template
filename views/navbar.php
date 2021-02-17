<nav class="navbar" id="app-nav">
	<div class="nav__logo">
		<img src="https://images.unsplash.com/photo-1601795313997-9734fed2b3ef?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Brand" width="" height="">
	</div>
	<div class="nav__brand">
		<span>Timmy</span>
	</div>
	
	
	<div class="nav__items">
		<button @click="view.mobileMenu = !view.mobileMenu" v-if="isMobileView">
			<i :class="['fa-2x fas', view.mobileMenu ? 'fa-times' : 'fa-bars']"></i>
		</button>		
		<transition 
            :enter-active-class="isMobileView ? 'animate__animated animate__slideInDown' : 'animate__animated animate__slideInRight'"
            :leave-active-class="isMobileView ? 'animate__animated animate__slideOutUp' : 'animate__animated animate__slideOutRight'"
            
        >
			<ul class="nav__list" v-if="!isMobileView || view.mobileMenu">
				<li class="nav__item"><a href="#">Home</a></li>
				<li class="nav__item"><a href="#">About</a></li>
				<li class="nav__item"><a href="#">Contact</a></li>
			</ul>
		</transition>
	</div>
</nav>