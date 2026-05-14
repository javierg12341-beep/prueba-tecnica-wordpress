
    <form id="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>"
        class="space-y-7 w-full">

        <input type="hidden" name="action" value="cl_submit_form">

        <?php wp_nonce_field('cl_submit_form_action', 'cl_submit_nonce'); ?>

        <div class="grid grid-cols-2 gap-6">

            <div>
                <input placeholder="Name" type="text" id="cl_first_name" name="first_name" required
                    class="w-full text-white font-secundary text-base font-normal placeholder:font-secondary placeholder:text-base placeholder:font-normal placeholder:text-white bg-transparent border-0 border-b border-slate-500/60 focus:border-colsecundary focus:ring-0 px-0 py-2  outline-none">
            </div>

            <div>

                <input placeholder="Last Name" type="text" id="cl_last_name" name="last_name" required
                    class="w-full text-white font-secundary text-base font-normal placeholder:font-secondary placeholder:text-base placeholder:font-normal placeholder:text-white bg-transparent border-0 border-b border-slate-500/60 focus:border-colsecundary focus:ring-0 px-0 py-2  outline-none">
            </div>

        </div>

        <div>

            <input placeholder="Title" type="text" id="cl_title" name="title" required
                class="w-full text-white font-secundary text-base font-normal placeholder:font-secondary placeholder:text-base placeholder:font-normal placeholder:text-white bg-transparent border-0 border-b border-slate-500/60 focus:border-colsecundary focus:ring-0 px-0 py-2  outline-none">
        </div>

        <div>
            <input placeholder="Company" type="text" id="cl_company" name="company" required
                class="w-full text-white font-secundary text-base font-normal placeholder:font-secondary placeholder:text-base placeholder:font-normal placeholder:text-white bg-transparent border-0 border-b border-slate-500/60 focus:border-colsecundary focus:ring-0 px-0 py-2  outline-none">
        </div>

        <div>
            <textarea placeholder="Message" id="cl_message" name="message" rows="5" required
                class="w-full text-white font-secundary text-base font-normal placeholder:font-secondary placeholder:text-base placeholder:font-normal active:border-colsecundar !focus-visible:border-colsecundary placeholder:text-white bg-transparent border-1 border-slate-500/60 focus:border-colsecundary  px-[27px] py-[26px] "></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex text-white font-secundary text-base font-normal items-center gap-2 text-[11px] uppercase tracking-[0.18em] text-white border-b border-white/60 pb-1 hover:text-[#f08b73] hover:border-[#f08b73] transition">
                Send
                <span aria-hidden="true">→</span>
            </button>
        </div>

        <!-- MENSAJE -->
        <p id="form-message" class="hidden text-sm mt-4 text-center"></p>

    </form>