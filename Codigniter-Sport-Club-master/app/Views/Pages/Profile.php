<form class=" sm:mx-auto font-sans bg-gray-100 sm:px-8 lg:px-32 md:py-8 px-3 py-2" enctype="multipart/form-data" onsubmit="return validateForm()" action="<?= base_url('/update_user') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="border-b border-gray-900/10 pb-12 ">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
    
        <div class="flesx flex-row ">

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <div class="flex items-center my-6 text-center justify-center">
                        <img src="img/images/img-2.jpg" alt="Profile Image" class="w-60 h-60 rounded-full object-cover mr-4">

                    </div>
                    <div class="mt-2">
                <input type="file" name="image" class="form-control" placeholder="image">
                </div>
                    <div>
                        <div class="flex flex-col text-center ">
                            <h2 class="text-xl font-semibold">User</h2>
                            <p class="text-gray-600">user@gmail.com</p>
                        </div>

                        

                    </div>
                </div>
        
                <div class="sm:col-span-3">
                <p class="mt-1 text-sm leading-6 text-gray-600 mb-2">"Enter at first your ancient Username." </p>
                <label for="PseudoNom" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        <input type="text" name="PseudoNom" id="PseudoNom" value="<?= session()->get('PseudoNom') ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
    
                    <p class="mt-1 text-sm leading-6 text-gray-600 mb-2">"Now enter your new informations." </p>
                    <label for="Nom" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                    <div class="mt-2">
                        <input type="text" name="Nom" id="Nom" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                    </div>
                    <label for="Prenom" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                    <div class="mt-2">
                        <input type="text" name="Prenom" id="Prenom" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                    </div>
                   
                   
                    <label for="Password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="text" name="Password" id="Password" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                    </div>
                    <label for="Nom" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                    <div class="mt-2">
                        <input type="text" name="CPassword" id="CPassword" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                    </div>
                    <button type="submit" class="mt-2 flex w-full justify-center rounded-md bg-blue-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600">Update informations</button>
                </div>

                <!-- <div class="sm:col-span-3  sm:col-start-1">

                </div>
                <div class="sm:col-span-3 ">
                    <p class="mt-1 text-sm leading-6 text-gray-600 mb-2">
                        "Enhance the security of your account by updating your password. Confirm the new password to ensure the accuracy of the changes."</p>
                    <label for="Nom" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="text" name="Nom" id="Nom" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                    </div>
                    <label for="Nom" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                    <div class="mt-2">
                        <input type="text" name="Nom" id="Nom" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                    </div>
                    <button type="submit" class="mt-2 flex w-full justify-center rounded-md bg-blue-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600">Update Password</button>
                </div> -->


</form>
<script>
    function validateForm() {
        var password = document.getElementById("Password").value;
        var confirmPassword = document.getElementById("CPassword").value;


        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return false;
        }

        return true;
    }
</script>