<?php

$hideNav = true;

require_once "./controllers/adminController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productname = $_POST["productname"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $voorraad = $_POST["voorraad"];
  $imgurl = $_POST["imgurl"];
  $category = $_POST["category"];


  $adminController = new AdminController();
  $adminController->addProduct($productname, $description, $price, $voorraad, $imgurl, $category);
}
?>

<form method="post" action="" lang="nl">
  <div class="space-y-12">
    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
      <div>
      </div>
      <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
        <div class="sm:col-span-4">
          <label for="productname" class="block text-sm font-medium leading-6 text-gray-900">Productnaam</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input spellcheck="true" type="text" name="productname" id="productname" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>

        <div class="col-span-full">
          <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Beschrijving</label>
          <div class="mt-2">
            <textarea spellcheck="true" id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input type="number" name="price" id="price" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="voorraad" class="block text-sm font-medium leading-6 text-gray-900">Voorraad</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input type="number" name="voorraad" id="voorraad" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="imgurl" class="block text-sm font-medium leading-6 text-gray-900">ImageURL</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input spellcheck="true" type="text" name="imgurl" id="imgurl" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="category" class="block text-sm font-medium leading-6 text-gray-900">categorie</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input spellcheck="true" type="text" name="category" id="category" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-center gap-x-6">
    <a href="/?page=admin">
      <h1 class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Cancel</h1>
    </a>
    <button type="submit" class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Toevoegen</button>
  </div>
</form>

<script>
  import nspell from 'nspell';
  import dictionaryNl from 'dictionary-nl';

  // Initialize nspell with the Dutch dictionary
  dictionaryNl(function(err, dictionary) {
    if (err) throw err;
    const spellchecker = nspell(dictionary);

    document.getElementsByTagName('form').addEventListener('submit', function(event) {
      event.preventDefault();

      const comments = document.getElementById('comments').value;
      const words = comments.split(/\s+/);
      const errors = words.filter(word => !spellchecker.correct(word));

      if (errors.length > 0) {
        alert('Spelfouten gevonden: ' + errors.join(', '));
      } else {
        alert('Geen spelfouten gevonden!');
      }
    });
  });
</script>