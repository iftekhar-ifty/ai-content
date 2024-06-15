

<div role="tablist" class="tabs tabs-boxed bg-transparent p-0">
    @if (session('status'))
        <div role="alert" class="alert alert-success mb-5 mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif
    <input
        type="radio"
        name="my_tabs_2"
        role="tab"
        class="tab text-white text-left py-2 h-auto min-w-[130px] checked:!bg-[#000000] checked:!text-white checked:!font-bold"
        aria-label="Basic Mode"
        checked
    />
    <div
        role="tabpanel"
        class="tab-content border-[#1b1b1d] !rounded-3xl py-5 px-4 sm:px-10 mt-6 sm:mt-12 relative"
    >
        <div class="bg-gradient-to-r from-[#fce48d] to-[#b98dfc] h-0.5 w-12 absolute top-0 left-4 sm:left-10" ></div>
        <div  class="backdrop-blur-md bg-white/10 w-[50px] border border-[#ffffff0a] rounded-lg flex justify-center items-center p-3 mb-7 relative shadow-[inset_0_-4px_8px_rgba(255,255,255,0.06)]"  >
            <img
                width="22"
                loading="lazy"
                alt=""
                src="{{ asset('content/frontend') }}/image/basic-mode.webp"
                class="relative h-[22px] w-[22px] z-20"
            /><img
                loading="lazy"
                src="{{ asset('content/frontend') }}/image/btn-bg.svg"
                alt=""
                class="absolute z-10"
            />
        </div>
        <div>
            <h2 class="text-xl md:text-2xl font-medium">Basic Mode</h2>
            <p class="text-sm text-white mt-2">
                Rewrites AI-generated outputs (or any text for that matter) and
                improves it's readability for humans.
            </p>


        </div>
        <div>
            <div class="border border-[#1b1b1d] rounded-3xl px-3 sm:px-6 py-5 sm:py-8 mt-2" >
                <div class="transition-all flex justify-between items-center backdrop-blur-md text-white bg-[#ffffff05]
                   hover:bg-[#ffffff0a] border border-[#ffffff0f] hover:border-[#ffffff33] rounded-md px-4 cursor-pointer "
                >
                <textarea type="text"
                          wire:model="generateData"
                          class="text-xs bg-transparent outline-0 w-full py-3 placeholder:text-white"
                          placeholder="Paste AI Generated Content Here ↓"
                          id="past_ai_field" cols="30" rows="10"></textarea>
                </div>
                <div class="flex justify-between items-center mt-8 sm:mt-14">
                    <div class="text-xs text-white flex items-center gap-2">
                        <svg
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M8 1.5C6.71442 1.5 5.45772 1.88122 4.3888 2.59545C3.31988 3.30968 2.48676 4.32484 1.99479 5.51256C1.50282 6.70028 1.37409 8.00721 1.6249 9.26809C1.8757 10.529 2.49477 11.6872 3.40381 12.5962C4.31285 13.5052 5.47104 14.1243 6.73192 14.3751C7.99279 14.6259 9.29973 14.4972 10.4874 14.0052C11.6752 13.5132 12.6903 12.6801 13.4046 11.6112C14.1188 10.5423 14.5 9.28558 14.5 8C14.4982 6.27665 13.8128 4.62441 12.5942 3.40582C11.3756 2.18722 9.72335 1.50182 8 1.5ZM7.75 4.5C7.89834 4.5 8.04334 4.54399 8.16668 4.6264C8.29002 4.70881 8.38615 4.82594 8.44291 4.96299C8.49968 5.10003 8.51453 5.25083 8.48559 5.39632C8.45665 5.5418 8.38522 5.67544 8.28033 5.78033C8.17544 5.88522 8.04181 5.95665 7.89632 5.98559C7.75083 6.01453 7.60003 5.99968 7.46299 5.94291C7.32595 5.88614 7.20881 5.79001 7.1264 5.66668C7.04399 5.54334 7 5.39834 7 5.25C7 5.05109 7.07902 4.86032 7.21967 4.71967C7.36032 4.57902 7.55109 4.5 7.75 4.5ZM8.5 11.5C8.23479 11.5 7.98043 11.3946 7.7929 11.2071C7.60536 11.0196 7.5 10.7652 7.5 10.5V8C7.36739 8 7.24022 7.94732 7.14645 7.85355C7.05268 7.75979 7 7.63261 7 7.5C7 7.36739 7.05268 7.24021 7.14645 7.14645C7.24022 7.05268 7.36739 7 7.5 7C7.76522 7 8.01957 7.10536 8.20711 7.29289C8.39465 7.48043 8.5 7.73478 8.5 8V10.5C8.63261 10.5 8.75979 10.5527 8.85356 10.6464C8.94732 10.7402 9 10.8674 9 11C9 11.1326 8.94732 11.2598 8.85356 11.3536C8.75979 11.4473 8.63261 11.5 8.5 11.5Z"
                                fill="currentColor"
                            ></path>
                        </svg>
                        <p >Basic mode is not recommended for SEO</p>
                    </div>
                    <a style="    cursor: pointer;"
                        wire:click="submitData"
                        class="bg-[#ffffff1f] bg-gradient-to-r from-[#ffffff14] to-[#8e78b014] border border-[#ffffff0f] rounded-3xl px-4 py-1.5 shadow-[inset_0_0.75px_0.75px_rgba(255,255,255,0.16)] font-medium text-white text-xs"
                    >
                        Humanize
                    </a>
                </div>
               @error('generateData')
                    <div class="alert alert-danger mt-3 text-white">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <div class="border border-[#1b1b1d] rounded-3xl px-3 sm:px-5 py-5 sm:py-10 mt-4 sm:mt-6 flex flex-col gap-10"  >
                    <div class="flex flex-col gap-8 sm:gap-12">
                        @if($checkLimitExpire or $userWordLeft <= 0)
                            <div role="alert" class="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span>Choose a plan to continue using Twixify</span>
                                <div>
                                    <a href="/user/plan-list" class="btn btn-sm btn-primary">See plan features</a>
                                </div>
                            </div>
                        @endif

                        <progress class="progress w-100" wire:loading wire:target="submitData"></progress>
                        <div
                            class="transition-all backdrop-blur-md text-white bg-[#ffffff05] hover:bg-[#ffffff0a] border border-[#ffffff0f] hover:border-[#ffffff33] shadow-[inset_0_-4px_12px_rgba(255,255,255,0.1)] border border-[#66666647] p-5 rounded-[20px] text-black text-base focus:outline focus:outline-[#ffffff47]"
                        >
                        <span class="text-xs text-white"
                        >Humanized Text</span
                        >
                            <p
                                        id="copy_text_content"
                                        class="text-base text-white"
                                    >
                                        {{ $generateResult ?? '' }}
                                    </p>
                        </div>
                        <div class="text-right flex justify-end items-center gap-5">
                                    <p
                                        id="copy_text_success"
                                        class="text-teal-500 text-xs font-medium hidden"
                                    >
                                        Text copied to clipboard!
                                    </p>
                                    <button
                                        id="copy_text_btn"
                                        class="bg-[#ffffff1f] bg-gradient-to-r from-[#ffffff14] to-[#8e78b014] border border-[#ffffff0f] rounded-3xl px-3 py-1 shadow-[inset_0_0.75px_0.75px_rgba(255,255,255,0.16)] font-medium text-white text-xs"
                                    >
                                        Copy
                                    </button>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input
            type="radio"
            name="my_tabs_2"
            role="tab"
            class="tab text-white text-left py-2 h-auto min-w-[150px] checked:!bg-[#000000] checked:!text-white checked:!font-bold"
            aria-label="Custom Mode"

        />
        <div
            role="tabpanel"
            class="tab-content border-[#1b1b1d] !rounded-3xl py-5 px-4 sm:px-10 mt-6 sm:mt-12 relative"
        >
            <div
                class="bg-gradient-to-r from-[#fce48d] to-[#b98dfc] h-0.5 w-12 absolute top-0 left-4 sm:left-10"
            ></div>
            <div
                class="backdrop-blur-md bg-white/10 w-[50px] border border-[#ffffff0a] rounded-lg flex justify-center items-center p-3 mb-7 relative shadow-[inset_0_-4px_8px_rgba(255,255,255,0.06)]"
            >
                <img
                    width="22"
                    loading="lazy"
                    alt=""
                    src="{{ asset('content/frontend') }}/image/custom-mode.webp"
                    class="relative h-[22px] w-[22px] z-20"
                /><img
                    loading="lazy"
                    src="{{ asset('content/frontend') }}/image/btn-bg.svg"
                    alt=""
                    class="absolute z-10"
                />
            </div>
            <div>
                <h2 class="text-xl md:text-2xl font-medium">Custom Mode</h2>
                <p class="text-sm text-[#9b9b9b] mt-2">
                    Write about anything in your own tone and writing style.
                </p>

                <div class=" mt-3 rounded-2xl flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
  <p class="text-center" style="margin: auto;">Custom mode is <b>temporarily</b> unavailable. <a style="text-decoration: underline!important;" href="https://www.twixify.com/contact">Contact us</a> for any questions.</p>
</div>
            </div>
            <div class="grid md:grid-cols-3 gap-6 mt-2">
                <div>
                    <form
                        class="border border-[#1b1b1d] rounded-3xl px-3 sm:px-5 py-6 sm:py-10 flex flex-col gap-6 sm:gap-10"
                    >
                        <div class="text-[#d6d6d6] text-xs flex flex-col gap-2">
                            <label for="sample_human"
                            >Sample Human Text To Use As Inspiration</label
                            >
                            <textarea
                                name="sample_human"
                                id="sample_human"
                                class="w-full bg-transparent border border-[#66666647] p-3 rounded-md text-xs h-[150px] sm:h-[200px] focus:outline focus:outline-[#ffffff47]"
                                placeholder="Sample Human Text To Use As Inspiration"
                            ></textarea>
                        </div>
                        <div class="text-[#d6d6d6] text-xs flex flex-col gap-5">
                            <p>Style</p>
                            <div class="flex flex-wrap gap-2">
                                <button
                                    class="backdrop-blur-lg bg-[#ffffff0a] border border-[#ffffff1a] rounded-3xl ps-1.5 pr-2.5 py-1 shadow-[inset_0_-4px_12px_rgba(255,255,255,0.1)]"
                                >
                                    ✨ Personable
                                </button>
                                <button
                                    class="backdrop-blur-lg bg-[#ffffff0a] border border-[#ffffff1a] rounded-3xl ps-1.5 pr-2.5 py-1 shadow-[inset_0_-4px_12px_rgba(255,255,255,0.1)]"
                                >
                                    🫠 Empathetic
                                </button>
                                <button
                                    class="backdrop-blur-lg bg-[#ffffff0a] border border-[#ffffff1a] rounded-3xl ps-1.5 pr-2.5 py-1 shadow-[inset_0_-4px_12px_rgba(255,255,255,0.1)]"
                                >
                                    🎯 Direct
                                </button>
                                <button
                                    class="backdrop-blur-lg bg-[#ffffff0a] border border-[#ffffff1a] rounded-3xl ps-1.5 pr-2.5 py-1 shadow-[inset_0_-4px_12px_rgba(255,255,255,0.1)]"
                                >
                                    😇 Friendly
                                </button>
                                <button
                                    class="backdrop-blur-lg bg-[#ffffff0a] border border-[#ffffff1a] rounded-3xl ps-1.5 pr-2.5 py-1 shadow-[inset_0_-4px_12px_rgba(255,255,255,0.1)]"
                                >
                                    🧐 Analytical
                                </button>
                                <button
                                    class="backdrop-blur-lg bg-[#ffffff0a] border border-[#ffffff1a] rounded-3xl ps-1.5 pr-2.5 py-1 shadow-[inset_0_-4px_12px_rgba(255,255,255,0.1)]"
                                >
                                    🤔 Custom
                                </button>
                            </div>
                        </div>
                        <div class="text-[#d6d6d6] text-xs flex flex-col gap-5">
                            <p>Output Depth & Length</p>
                            <div class="relative h-12">
                                <input
                                    type="range"
                                    min="0"
                                    max="100"
                                    value="50"
                                    id="output-depth"
                                    class="appearance-none"
                                    style="--range-value: 50%"
                                />
                                <span
                                    class="absolute left-[50%] bottom-0"
                                    id="output-depth-value"
                                >50</span
                                >
                            </div>
                        </div>
                        <div class="text-[#d6d6d6] text-xs flex flex-col gap-2">
                            <label for="sample_human">
                                Personal Experience & Opinions
                            </label>
                            <textarea
                                name="sample_human"
                                id="sample_human"
                                class="w-full bg-transparent border border-[#66666647] p-3 rounded-md text-xs h-[150px] sm:h-[200px] focus:outline focus:outline-[#ffffff47]"
                                placeholder="7 Years experience using Photoshop. I strongly believe that anyone can become a pro at Photoshop. It's Easy!"
                            ></textarea>
                        </div>
                        <div class="text-[#d6d6d6] text-xs flex flex-col gap-2">
                            <label for="sample_human">
                                Additional Knowledge & Fact Insertions
                            </label>
                            <textarea
                                name="sample_human"
                                id="sample_human"
                                class="w-full bg-transparent border border-[#66666647] p-3 rounded-md text-xs h-[150px] sm:h-[200px] focus:outline focus:outline-[#ffffff47]"
                                placeholder='While working on fine details, instead of zooming in and out constantly, you can quickly access the Bird’s Eye View by holding down the "H" key while zoomed in. '
                            ></textarea>
                        </div>
                    </form>
                </div>
                <div class="sm:col-span-2">
                    <form
                        class="border border-[#1b1b1d] rounded-3xl px-3 sm:px-5 py-6 sm:py-10 flex flex-col gap-6 sm:gap-10"
                    >
                        <div class="text-[#d6d6d6] text-xs flex flex-col gap-2">
                            <label for="sample_human">
                                Input ChatGPT's Output Here
                            </label>
                            <textarea
                                name="sample_human"
                                id="sample_human"
                                class="w-full bg-transparent border border-[#66666647] p-3 rounded-md text-xs h-[200px] focus:outline focus:outline-[#ffffff47]"
                                placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus condimentum at nisl ac pretium. Maecenas placerat vehicula."
                            ></textarea>
                            <input
                                class="inline-block w-20 bg-[#ffffff1f] bg-gradient-to-r from-[#ffffff14] to-[#8e78b014] border border-[#ffffff0f] rounded-3xl px-3 py-1.5 shadow-[inset_0_0.75px_0.75px_rgba(255,255,255,0.16)] font-medium text-white"
                                type="button"
                                value="Submit"
                            />
                        </div>
                    </form>
                    <div class="mt-3">
                  <textarea
                      name="sample_human"
                      id="sample_human"
                      class="w-full  border border-[#66666647] p-5 rounded-[20px] h-[150px] text-black text-base focus:outline focus:outline-[#ffffff47]" style="background: #202020"
                      placeholder="Humanized Text"
                  ></textarea>
                    </div>
                </div>
            </div>
        </div>
</div>
