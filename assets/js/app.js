// ---------- Custom Mouse (start) ---------- //
// const customMouse = {
// 	cursor: document.getElementById('cursor'),
// 	aura: document.getElementById('aura'),
// 	links: document.querySelectorAll('a, .cursor-trigger'),

// 	mouseX: 0, mouseY: 0, posX: 0, posY: 0,

// 	mouseMove: (e) => {
// 		customMouse.mouseX = e.clientX;
// 		customMouse.mouseY = e.clientY;

// 		customMouse.posX = e.clientX;
// 		customMouse.posY = e.clientY; 

// 		cursor.style.transform = `translate(${customMouse.mouseX - 4}px, ${customMouse.mouseY - 4}px)`;
// 		aura.style.transform = `translate(${customMouse.posX - 24}px, ${customMouse.posY - 24}px)`;
// 	},

// 	mouseHide: () => {
// 		console.log('-');
// 		customMouse.cursor.style.display = 'none';
// 		customMouse.aura.style.display = 'none';
// 	},
// 	mouseShow: () => {
// 		console.log('+');
// 		customMouse.cursor.style.display = 'block';
// 		customMouse.aura.style.display = 'block';
// 	}
// }

// window.addEventListener("mousemove", customMouse.mouseMove);
// document.addEventListener("mouseout", customMouse.mouseHide);
// document.addEventListener("mouseover", customMouse.mouseShow);
// ---------- Custom Mouse (end) ---------- //


// ---------- Iframe overlay (start) ---------- //
// DO NOT USE THIS for services with authorization !!!
function openIframeOverlay(link, name = '') {
	let tempElem = document.createElement('div');
	tempElem.classList.add("overlay-block");
	tempElem.innerHTML = `
	<div id="overlay" class="is-iframe-overlay">
		<div class="is-iframe-overlay__panel">
			<div id="closeBtn" class="btn is-transparent-bg is-only-icon"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M24 16C24 16.5523 23.5523 17 23 17H11.4142L15.7071 21.2929C16.0976 21.6834 16.0976 22.3166 15.7071 22.7071C15.3166 23.0976 14.6834 23.0976 14.2929 22.7071L8.29289 16.7071C7.90237 16.3166 7.90237 15.6834 8.29289 15.2929L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L11.4142 15H23C23.5523 15 24 15.4477 24 16Z" fill="white"/></svg></div>
			<span class="is-iframe-overlay__panel__name">${name}</span>
		</div>
		<iframe src="${link}"></iframe>
	</div>
	<div id="closeArea"></div>`;

	document.body.append(tempElem);
	document.body.style.overflow = "hidden";

	document.querySelector(".overlay-block #closeArea").addEventListener("click", () => { closeCurrentOverlay(); });
	document.querySelector(".overlay-block #closeBtn").addEventListener("click", () => { closeCurrentOverlay(); });
}
// ---------- Iframe overlay (end) ---------- //


// ---------- Image overlay (start) ---------- //
function openImageOverlay(images) {
	let tempElem = document.createElement('div');
	tempElem.classList.add("overlay-block");
	tempElem.innerHTML = `
		<div id="overlay" class="is-img-overlay ${ images.length > 1 ? "is-gallery" : null }">
			<div id="closeBtn" class="btn is-transparent-bg is-only-icon"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M9.29289 9.29289C9.68342 8.90237 10.3166 8.90237 10.7071 9.29289L16 14.5858L21.2929 9.29289C21.6834 8.90237 22.3166 8.90237 22.7071 9.29289C23.0976 9.68342 23.0976 10.3166 22.7071 10.7071L17.4142 16L22.7071 21.2929C23.0976 21.6834 23.0976 22.3166 22.7071 22.7071C22.3166 23.0976 21.6834 23.0976 21.2929 22.7071L16 17.4142L10.7071 22.7071C10.3166 23.0976 9.68342 23.0976 9.29289 22.7071C8.90237 22.3166 8.90237 21.6834 9.29289 21.2929L14.5858 16L9.29289 10.7071C8.90237 10.3166 8.90237 9.68342 9.29289 9.29289Z" fill="white"/></svg></div>
			<div id="imgSlideLeft"></div>
			<div id="imgSlideRight"></div>
		</div>
		<div id="closeArea"></div>`;

	for (let i = 0; i < images.length; i++) {
		let tempImg = document.createElement("img");
		tempImg.setAttribute("src", images[i].getAttribute("src"));
		tempElem.querySelector("#overlay").append(tempImg);
	}
	
	tempElem.querySelector("img").classList.add("current")

	document.body.append(tempElem);
	document.body.style.overflow = "hidden";

	document.querySelector(".overlay-block #closeArea").addEventListener("click", () => { closeCurrentOverlay(); });
	document.querySelector(".overlay-block #closeBtn").addEventListener("click", () => { closeCurrentOverlay(); });

	function slideGallery(direction) {
		let overlayImages = document.querySelectorAll(".is-img-overlay img");
		
		for (let i = 0; i<overlayImages.length; i++) {
			if(overlayImages[i].classList.contains("current")) {
				overlayImages[i].classList.remove("current");

				if(direction === -1 && i === 0) overlayImages[overlayImages.length-1].classList.add("current");
					else if(direction === 1 && i === overlayImages.length-1) overlayImages[0].classList.add("current");
						else overlayImages[i+direction].classList.add("current");

				return true;
			}
		}
	}

	document.querySelector(".overlay-block #imgSlideLeft").addEventListener("click", () => { slideGallery(-1); });
	document.querySelector(".overlay-block #imgSlideRight").addEventListener("click", () => { slideGallery(1); });
}

const clickImg = document.querySelectorAll(".comma-wp-content img");
for(let i=0; i<clickImg.length; i++) {
	clickImg[i].addEventListener("click", () => { openImageOverlay(clickImg); })
}
// ---------- Image overlay (end) ---------- //


// ---------- Close overlay (start) ---------- //
function closeCurrentOverlay() {
	document.querySelector('.overlay-block').remove();
	document.body.style.overflow = "auto";
}
// ---------- Close overlay (end) ---------- //