<section class="account__deletion py-6 px-4 xl:px-0 xl:pr-4">
  <div class="py-6 bg__adaptive px-4 md:w-1/2 shadow-md">
    <h1 class="subtitle__text text__adaptive">Account Deletion - <span class="text__danger">Danger Zone</span>
    </h1>
    <p class="para mt-6 py-2 text__adaptive">
      Hello, after deleting the account, the account
      will be destroyed and all post and comments related
      to this account will be deleted. <br> <br>
      <strong>Please note:</strong> This operation cannot be undone.
    </p>
    <div class="mt-6 relative">
      <button type="button" @click.prevent="toggleModal" name="save-socials" class="danger__btn hover:bg-red-400">Delete
        Immediately</button>
    </div>
  </div>
</section>