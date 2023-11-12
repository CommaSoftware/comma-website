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