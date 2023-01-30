<html>
<head>
  <style>

  </style>
  @livewireStyles

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <div class="container p-7">
    @livewire('select-company')
    @livewire('task-table')
    @livewire('create-task')
  </div>

  @livewireScripts
</body>
</html>
