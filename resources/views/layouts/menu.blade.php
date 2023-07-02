<nav class="navbar">
  <a class="nav-link active" href="#">
    <i class="fas fa-home"></i>
    <span>Início</span>
  </a>
  <a class="nav-link" href="#">
    <i class="fas fa-dumbbell"></i>
    <span>Exercícios</span>
  </a>
  <a class="nav-link" href="#">
    <i class="fas fa-chart-line"></i>
    <span>Progresso</span>
  </a>
  <a class="nav-link" href="#">
    <i class="fas fa-user"></i>
    <span>Perfil</span>
  </a>
</nav>

<style>
@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap');

.navbar {
  position: fixed;
  bottom: 0;
  width: 100%;
  background-color: #0B132B;
  display: flex;
  justify-content: space-around;
  padding: 10px 0;
  font-family: 'Rubik', sans-serif;
}

.nav-link {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #FFFFFF;
  text-decoration: none;
  font-size: 16px;
  opacity: 0.7;
  transition: opacity 0.3s, transform 0.3s;
}

.nav-link i {
  margin-bottom: 5px;
  font-size: 28px;
  transition: transform 0.3s;
}

.nav-link.active {
  opacity: 1;
}

.nav-link.active i {
  transform: scale(1.2);
}

.nav-link:hover {
  opacity: 1;
}

.nav-link:hover i {
  transform: scale(1.2);
}
</style>

<script>
  // Adicione a classe 'active' ao link selecionado
  const navLinks = document.querySelectorAll('.nav-link');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      navLinks.forEach(link => link.classList.remove('active'));
      link.classList.add('active');
    });
  });
</script>
