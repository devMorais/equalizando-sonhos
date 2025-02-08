<?php

use Illuminate\Support\Facades\File;

/** Handle file upload */
function handleUpload($inputName, $model = null)
{
  try {
    if (request()->hasFile($inputName)) {
      $file = request()->file($inputName);
      $fileName = rand() . '_' . $file->getClientOriginalName();

      // Determine o caminho de upload com base no ambiente
      $uploadPath = env('APP_ENV') === 'production'
        ? base_path('public_html/uploads')
        : public_path('uploads');

      // Crie o diretório se não existir
      if (!File::exists($uploadPath)) {
        File::makeDirectory($uploadPath, 0755, true);
      }

      // Delete o arquivo antigo se existir
      if ($model && !empty($model->{$inputName})) {
        $oldFilePath = env('APP_ENV') === 'production'
          ? base_path('public_html/' . $model->{$inputName})
          : public_path($model->{$inputName});

        if (File::exists($oldFilePath)) {
          File::delete($oldFilePath);
        }
      }

      // Move o novo arquivo
      $file->move($uploadPath, $fileName);

      // Retorna o caminho relativo
      return "uploads/" . $fileName;
    }
  } catch (\Exception $e) {
    throw $e;
  }
}

/** Delete file */
function deleteFileIfExist($filePath)
{
  try {
    $fullPath = env('APP_ENV') === 'production'
      ? base_path('public_html/' . $filePath)
      : public_path($filePath);

    if (File::exists($fullPath)) {
      File::delete($fullPath);
    }
  } catch (\Exception $e) {
    throw $e;
  }
}

/** get dynamic colors  */
function getColor($index)
{
  $colors = [
    '#f75639', // Cor base 1
    '#0c3a68', // Cor base 2
    '#ffcc00', // Amarelo vibrante (contraste com o vermelho)
    '#005b96', // Azul escuro (contraste com o azul)
    '#ff8c00', // Laranja (contraste com o vermelho)
    '#a3d0e1'  // Azul claro (contraste suave com o azul escuro)
  ];

  return $colors[$index % count($colors)];
}

/** Set Sidebar Active  */
function setSidebarActive($route)
{
  if (is_array($route)) {
    foreach ($route as $r) {
      if (request()->routeIs($r)) {
        return 'active';
      }
    }
  }
}
