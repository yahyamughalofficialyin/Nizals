<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Image Viewer</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }
        canvas {
            display: block;
        }
    </style>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js"></script>
    <script>
        // Set up Three.js scene, camera, and renderer
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Load the 3D model (replace 'path/to/your-3d-model.glb' with your model's path)
const loader = new THREE.GLTFLoader();
let model;

loader.load('path/to/your-3d-model.glb', (gltf) => {
    model = gltf.scene;
    scene.add(model);
});

// Position the camera and set initial rotation
camera.position.z = 5;

// Function to animate the scene
function animate() {
    requestAnimationFrame(animate);

    // Rotate the model (replace 0.01 with your desired rotation speed)
    if (model) {
        model.rotation.y += 0.01;
    }

    renderer.render(scene, camera);
}

animate();

    </script>
</body>
</html>
