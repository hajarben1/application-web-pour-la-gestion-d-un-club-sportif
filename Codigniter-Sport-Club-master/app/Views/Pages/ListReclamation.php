
<div class="flex flex-col justify-center px-6 py-12 lg:px-8 h-[500px] text-xs md:text-sm lg:text-lg">
    <div class="">
        <h2 class="text-center  md:text-2xl text-lg  font-bold leading-9 tracking-tight text-gray-900">List of <span class="underline underline-offset-3 text-orange-500 ">Reclamation</span></h2>
    </div>

    <div class="mt-8 text-[10px] lg:text-lg ">
        <div class="bg-white border-2 border-orange-500 h-16 w-full rounded-md flex items-center justify-between px-4 gap-1">
            <div class="md:w-24 w-12 text-center ">Date</div>
            <div class="grow  text-center">Reclamation</div>
            <div class="md:w-36 w-16  text-center">Utilisateur</div>



            <div class="md:w-36 text-center rounded-md bg-red-300 md:px-3 px-1 md:py-1.5 md:text-sm  font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 ">Actions</div>
            


        </div>
        
        <div  >
       


            <?php foreach ($data as $reclam) : ?>
                <form class="md:container md:mx-auto font-sans bg-gray-100 md:px-64 md:py-8 px-3 py-2" onsubmit="return validateForm()" action="<?= base_url('/reclame/change') ?>" method="POST">
                    <?= csrf_field() ?>

                <input type="hidden" name="NumReclamation" value="<?= $reclam['NumReclamation'] ?>">
                <div style="display: flex;  margin-right: -380px;   "  >
                    <div style="margin-left: -380px; " class="md:w-24 w-12  text-center"><?= $reclam['DateReclamation'] ?></div>
                    <div class="grow  text-center "><?= $reclam['CorpReclamation'] ?></div>
                    <div class="md:w-36 w-16 text-center"><?= $reclam['PseudoNom'] ?></div>
                   
                    <div class="md:w-36 w-18 flex md:flex-row flex-col  md:space-x-2  ">
                    
                    <div style="margin-right: -240px; display: flex; " >
                        <button name="action" value="accept"  type="submit" class="flex w-full justify-center rounded-md bg-blue-300 md:px-3 md:py-1.5 px-1 md:text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 ">
                            
                            Accept
                            
                        </button>
                        <button name="action" value="refuse"  style="margin-left: 10px; "   type="submit" onclick="changefirst1()" class="flex w-full justify-center rounded-md bg-red-300 md:px-3 md:py-1.5 px-1 md:text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 mt-[2px] md:mt-0 ">refuse</button>
                        </div>
                    

        </div>
        </form> 
                    </div>
                    <form class="md:container md:mx-auto font-sans bg-gray-100 md:px-64 md:py-8 px-3 py-2" onsubmit="return validateForm()" action="<?= base_url('/reclame/createex') ?>" method="POST">
    <?= csrf_field() ?>
    <input type="hidden" name="NumReclamation" value="<?= $reclam['NumReclamation'] ?>">
            <div style="display:none" id="open1" >
            <!-- <div class="grow  text-center">Explications</div> -->
            <h6 style="margin-top: -20px;margin-bottom: 10px;" class="text-center  md:text-2xl text-lg  font-semibold leading-9 tracking-tight text-gray-900 underline  underline-offset-3 ">Explications</h6>
            <input style="padding-bottom: 20px; "  id="Explications" name="Explications" type="text"  required class="pt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
            <!-- <button onclick="changefirst()"   >Send</button> -->
            <button type="submit" style="background-color: red; margin-top: 20px;" onclick="changefirst()"  class="flex w-20 justify-center rounded-md bg-blue-300 md:px-3 md:py-1.5 px-1 md:text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 ">
                            Send
                        </button>
            </div>
            <?php endforeach; ?>
        </div>

        

    </div>
</div>
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
<script src="js/script.js"> </script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    