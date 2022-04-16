<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rezdian Blog | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">    
    <!-- Custom styles for this template -->
    <link href="/assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/trix.css">
    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }
    </style>
  </head>
  <body>
    
@include('dashboard.layouts.partials.header')

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.partials.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     @yield('container')
    </main>
  </div>
</div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <script src="/assets/js/dashboard.js"></script>
        <script type="text/javascript" src="/assets/js/trix.js"></script>
        <script>
          const title = document.querySelector('#title');
          const slug = document.querySelector('#slug');
      
          title.addEventListener('change', function(){ 
              fetch('/dashboard/blog/checkSlug?title=' + title.value)
              .then(response => response.json())
              .then(data => slug.value = data.slug)
          });
      
          document.addEventListener('trix-file-accept', function(e){
              e.preventDefault();
          });
      
          function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            
            imgPreview.style.display = 'block';
      
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
      
            oFReader.onload = function(oFREvent) {
              imgPreview.src = oFREvent.target.result;
            }
      
          }
      </script>
    </body>
</html>
