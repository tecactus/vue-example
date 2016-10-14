<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vue-Example</title>

  <link rel="stylesheet" href="bower_components/reveal.js/css/reveal.css">
  <link rel="stylesheet" href="bower_components/reveal.js/css/theme/custom-league.css">
  <link rel="stylesheet" href="bower_components/reveal.js/lib/css/zenburn.css">

</head>
<body>

  <div class="reveal">
      <div class="slides">
          <section>
            <h1>Javascript</h1>
          </section>

          <section data-background="img/mind_blow.gif">
            <h2>Sin dolores de Cabeza!</h2>
          </section>

          <section>
            <h2>¿El problema?</h2>
            <ul>
              <li data-fragment-index="0" class="fragment">Más de un lenguaje</li>
              <li data-fragment-index="1" class="fragment">Manipulación de los datos</li>
              <li data-fragment-index="2" class="fragment">Estructura de scripts</li>
            </ul>
          </section>

          <section>
            <img class="plain" src="img/vue_logo.png" alt="Vue">
            <h2>Vue.js</h2>
          </section>

          <section>
            <h2>¿Qué es Vue.js?</h2>
            <ul>
              <li data-fragment-index="0" class="fragment">Framework para interfaces de usuario</li>
              <li data-fragment-index="2" class="fragment">Accesible</li>
              <li data-fragment-index="3" class="fragment">Versátil</li>
              <li data-fragment-index="4" class="fragment">Buen desempeño (16kb min+gzip)</li>
            </ul>
            <aside class="notes">
            Acc: HTML + CSS + JS
            Ver: Simple, núcleo mínimo e incrementalmente adaptable, apps any scale
          </aside>
          </section>

          <section>
            <h2>Instalación</h2>
            <pre><code class="html hljs">
  ...
  <script src="js/vue.min.js"></script>
  ...
            </code></pre>
          </section>

          <section>
            <h2>Creando una instancia de Vue</h2>
            <pre><code class="js hljs">
var app = new Vue({
  el: '', // elemento HTML,
  data: {}, // propiedades
  methods: {}, // funciones
  computed: {}, // funciones como propiedades
  watch: {}, // watchers
  mounted: {}, // previamente ready
})  
            </code></pre>
          </section>

          <section>
            <h2>Ejemplos</h2>
          </section>

          <section>
        <section>
          <h3>Renderización declarativa</h3>
            <pre><code class="html hljs">
<div id="app">
  {{ mensaje }}
</div>
            </code></pre>

            <pre><code class="js hljs">
var app = new Vue({
  el: '#app',
  data: {
    mensaje: 'Laravel Perú!'
  }
})
            </code></pre>

            <pre>
<div id="app">
{{ mensaje }}
</div>
            </pre>

                <h3>Ahora probemos algo...</h3>
        </section>

              <section data-background="img/awesome.gif">
                <h2>ahora todo es REACTIVO!</h2>
              </section>
          </section>

      <section>
        <h3>Enlace de atributos</h3>
          <pre><code class="html hljs">
<div id="app-2">
  <span v-bind:title="mensaje">
    Coloca el mouse encima unos segundos para ver el título!
  </span>
</div>
          </code></pre>

          <pre><code class="js hljs">
var app2 = new Vue({
  el: '#app-2',
  data: {
    message: 'You loaded this page on ' + new Date()
  }
})
          </code></pre>

          <pre>
<div id="app-2">
  <span v-bind:title="mensaje">
    Coloca el mouse encima unos segundos para ver el título!
  </span>
</div>
        </pre>

              <h3>Ahora probemos cambiar la información...</h3>
            <aside class="notes">
            El atributo v-bind, es una directiva.
            Manten actualizado el "title" del elemento con la propiedad "mensaje" de la instancia de Vue.
          </aside>
      </section>

      <section>
        <h3>Condicionales y Loops</h3>
          <pre><code class="html hljs">
<div id="app-3">
  <p v-if="visible">Ahora me puedes ver</p>
</div>
          </code></pre>

          <pre><code class="js hljs">
var app3 = new Vue({
  el: '#app-3',
  data: {
    visible: true
  }
})
          </code></pre>

          <pre>
<div id="app-3">
  <p v-if="visible">Ahora me puedes ver</p>
</div>
        </pre>

              <h3>Ahora ocultemos el texto...</h3>
      </section>

      <section>
      <section>
        <h3>Condicionales y Loops</h3>
          <pre><code class="html hljs">
<div id="app-4">
  <ol>
    <li v-for="tarea in tareas">
      {{ tarea.descripcion }}
    </li>
  </ol>
</div>
          </code></pre>

          <pre><code class="js hljs">
var app4 = new Vue({
  el: '#app-4',
  data: {
    tareas: [
      { descripcion: 'Aprender JavaScript' },
      { descripcion: 'Aprender Vue' },
      { descripcion: 'Integrar con Laravel' }
    ]
  }
})
          </code></pre>
      </section>

      <section>

          
        <div id="app-4">
          <ol>
            <li v-for="tarea in tareas">
              {{ tarea.descripcion }}
            </li>
          </ol>
        </div>
        <br>    

              <h3>Agregemos un elemento...</h3>
            <aside class="notes">
            El atributo v-bind, es una directiva.
            Manten actualizado el "title" del elemento con la propiedad "mensaje" de la instancia de Vue.
          </aside>
      </section>
      </section>

      <section>
      <section>
        <h3>Manejando los input del usuario</h3>
          <pre><code class="html hljs">
<div id="app-5">
  <p>{{ mensaje }}</p>
  <button v-on:click="revertirMensaje">Revertir mensaje</button>
</div>
          </code></pre>

          <pre><code class="js hljs">
var app5 = new Vue({
  el: '#app-5',
  data: {
    mensaje: 'Hola Laravel Perú!'
  },
  methods: {
    revertirMensaje: function () {
      this.mensaje = this.mensaje.split('').reverse().join('')
    }
  }
})
          </code></pre>
      </section>

      <section>

          <pre>
<div id="app-5">
  <p>{{ mensaje }}</p>
  <button v-on:click="revertirMensaje">Revertir mensaje</button>
</div>
        </pre>
      </section>
      </section>

      <section>
        <h3>Manejando los input del usuario</h3>
          <pre><code class="html hljs">
<div id="app-6">
  <p>{{ mensaje }}</p>
  <input v-model="mensaje">
</div>
          </code></pre>

          <pre><code class="js hljs">
var app6 = new Vue({
  el: '#app-6',
  data: {
    mensaje: 'Hola Mundo!'
  }
})
          </code></pre>

          <pre>
<div id="app-6">
  <p>{{ mensaje }}</p>
  <input v-model="mensaje">
</div>
        </pre>
      </section>

      <section>
        <h2>Laravel + Vue.js</h2>
      </section>

      <section>
        <h3>Imprimiendo Variables en @Blade</h3>

          <p>Laravel</p>

          <pre><code class="html hljs">
<p>{{ $mensaje }}</p>
          </code></pre>

          <p>Vue</p>

          <pre><code class="html hljs">
<p>@{{ mensaje }}</p>
          </code></pre>

          <p>Laravel + Vue</p>

          <pre><code class="html hljs">
<p>{{ $mensaje }} @{{ mensaje }}</p>
          </code></pre>

      </section>

        <section>
          <h2>Manejando Selects dependientes</h2>
        </section>

        <section data-background="img/argh.gif">
          <h2>¿Ahora Qué?</h2>
        </section>

        <section>
          <img class="plain" src="img/vue_logo.png" alt="Vue">
          <h2>Vue-Resource</h2>
        </section>

          <section>
            <h2>Instalación</h2>
            <pre><code class="html hljs">
  ...
  <script src="js/vue.min.js"></script>
  <script src="js/vue-resource.min.js"></script>
  ...
            </code></pre>
          </section>

        <section>
          <h2>Repo</h2>
          <h3>https://github.com/tecactus/vue-example</h3>
        </section>

        <section data-background="img/wink.gif">
          <h2>Gracias!</h2>
        </section>

      </div>
  </div>
  
    <script src="bower_components/headjs/dist/1.0.0/head.js"></script>
    <script src="bower_components/reveal.js/js/reveal.js"></script>
    <script src="bower_components/reveal.js/plugin/highlight/highlight.js"></script>
    <script src="js/vue.min.js"></script>
    
    <script>
        Reveal.initialize({
        dependencies: [
            // Cross-browser shim that fully implements classList - https://github.com/eligrey/classList.js/
            { src: 'bower_components/reveal.js/lib/js/classList.js', condition: function() { return !document.body.classList; } },

            // Syntax highlight for <code> elements
            { src: 'bower_components/reveal.js/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },

            // Zoom in and out with Alt+click
            { src: 'bower_components/reveal.js/plugin/zoom-js/zoom.js', async: true },

            // Speaker notes
            { src: 'bower_components/reveal.js/plugin/notes/notes.js', async: true },

            // MathJax
            { src: 'bower_components/reveal.js/plugin/math/math.js', async: true }
        ]
    });
    </script>

    <script>
      var app = new Vue({
      el: '#app',
      data: {
        mensaje: 'Laravel Perú!'
      }
    })

    var app2 = new Vue({
      el: '#app-2',
      data: {
        mensaje: 'Esta página fue cargada a las ' + new Date()
      }
    })

    var app3 = new Vue({
      el: '#app-3',
      data: {
        visible: true
      }
    })

    var app4 = new Vue({
      el: '#app-4',
      data: {
        tareas: [
          { descripcion: 'Aprender JavaScript' },
          { descripcion: 'Aprender Vue' },
          { descripcion: 'Integrar con Laravel' }
        ]
      }
    })

    var app5 = new Vue({
      el: '#app-5',
      data: {
        mensaje: 'Hola Laravel Perú!'
      },
      methods: {
        revertirMensaje: function () {
          this.mensaje = this.mensaje.split('').reverse().join('')
        }
      }
    })

    var app6 = new Vue({
      el: '#app-6',
      data: {
        mensaje: 'Hola Mundo!'
      }
    })
    </script>
</body>
</html>