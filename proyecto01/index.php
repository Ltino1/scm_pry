  <link href="css/estilos.css" rel="stylesheet" type="text/css" />

<body>
    <header class="encabezado">
        <nav class="navegacion">
            <a href="#inicio">INICIO</a>
            <a href="#nosotros">NOSOTROS</a>
            <a href="#servicios">SERVICIOS</a>
            <a href="#contacto">CONTACTO</a>
        </nav>
        
        <div class="heroe">
            <div class="contenido-heroe">
                <h1>El mejor cuidado para tu mejor amigo</h1>
                <p>Atendemos a tu mascota con dedicación y cariño, ofreciendo servicios completos para cuidar su salud y bienestar en todo momento.</p>
            </div>
            <div class="imagen-heroe">
                <div class="contenedor-imagen-heroe">
                    <img src="img/img1.png" alt="Veterinario examinando perro" class="imagen-fondo-heroe">
                    <div class="superposicion-imagen-heroe"></div>
                </div>
            </div>
        </div>
    </header>

    <section class="servicios" id="servicios">
        <h2>NUESTROS SERVICIOS</h2>
        <p class="subtitulo-servicios">
            Brindamos la mejor atención médica y cuidados especializados para tu mascota con el más moderno equipo médico y gran experiencia, asegurando que cada visita sea una experiencia segura y reconfortante, de la mejor forma y siempre con mucho amor.
        </p>
        
        <div class="cuadricula-servicios">
            <div class="tarjeta-servicio">
                <div class="imagen-servicio">
                    <img src="img/img2.png" alt="Consulta veterinaria">
                    <div class="superposicion-imagen-servicio">
                    </div>
                </div>
                <div class="contenido-servicio">
                    <h3>Consultas Generales</h3>
                    <p>Exámenes médicos completos para mantener la salud de tu mascota al día con revisiones preventivas y diagnósticos especializados.</p>
                </div>
            </div>
            
            <div class="tarjeta-servicio">
                <div class="imagen-servicio">
                    <img src="img/img3.png" alt="Vacunación de mascota">
                    <div class="superposicion-imagen-servicio">

                    </div>
                </div>
                <div class="contenido-servicio">
                    <h3>Vacunación</h3>
                    <p>Programas completos de vacunación para proteger a tu mascota de enfermedades, manteniendo al día su calendario de inmunizaciones.</p>
                </div>
            </div>
            
            <div class="tarjeta-servicio">
                <div class="imagen-servicio">
                    <img src="img/img4.png" alt="Cirugía veterinaria">
                    <div class="superposicion-imagen-servicio">
                      
                    </div>
                </div>
                <div class="contenido-servicio">
                    <h3>Cirugías</h3>
                    <p>Procedimientos quirúrgicos especializados realizados con tecnología moderna y el máximo cuidado para la seguridad de tu mascota.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="pie-pagina">
        <div class="contenido-pie-pagina">
            <div class="texto-pie-pagina">
                De la cruz Arias Jhojan- IESTPFFAA
            </div>
            <button class="boton-pie-pagina">CONTÁCTANOS</button>
        </div>
    </footer>

    <script>
        // Desplazamiento suave para enlaces de navegación
        document.querySelectorAll('.navegacion a').forEach(enlace => {
            enlace.addEventListener('click', function (e) {
                e.preventDefault();
                const objetivo = document.querySelector(this.getAttribute('href'));
                if (objetivo) {
                    objetivo.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Agregar efectos hover a las tarjetas de servicios
        document.querySelectorAll('.tarjeta-servicio').forEach(tarjeta => {
            tarjeta.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            tarjeta.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Contador animado para servicios
        let tarjetasServicios = document.querySelectorAll('.tarjeta-servicio');
        let observador = new IntersectionObserver(entradas => {
            entradas.forEach(entrada => {
                if (entrada.isIntersecting) {
                    entrada.target.style.opacity = '1';
                    entrada.target.style.transform = 'translateY(0)';
                }
            });
        });

        tarjetasServicios.forEach(tarjeta => {
            tarjeta.style.opacity = '0';
            tarjeta.style.transform = 'translateY(30px)';
            tarjeta.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observador.observe(tarjeta);
        });
    </script>
</body>
