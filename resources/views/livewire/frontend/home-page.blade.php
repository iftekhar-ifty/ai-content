<div>
      <main>
      <section class="w-full max-w-[1600px] mx-auto px-3 sm:px-5 py-12">
        <div class="text-right">

          <div class="bg-transparent relative transition-all">
            <div class="flex justify-end">
              <div
                  @guest
                      wire:click="goToLogin"
                  @endguest
                id="user_icon_btn"
                class="bg-white hover:bg-white/90 text-white rounded-full p-0.5 cursor-pointer"
              >
                <svg
                  enable-background="new 0 0 50 50"
                  height="30px"
                  id="Layer_1"
                  version="1.1"
                  viewBox="0 0 50 50"
                  width="30px"
                  xml:space="preserve"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <circle
                    cx="25"
                    cy="25"
                    fill="none"
                    r="24"
                    stroke="#000"
                    stroke-linecap="round"
                    stroke-miterlimit="10"
                    stroke-width="2"
                  />
                  <rect fill="none" height="50" width="50" />
                  <path
                    d="M29.933,35.528c-0.146-1.612-0.09-2.737-0.09-4.21c0.73-0.383,2.038-2.825,2.259-4.888c0.574-0.047,1.479-0.607,1.744-2.818  c0.143-1.187-0.425-1.855-0.771-2.065c0.934-2.809,2.874-11.499-3.588-12.397c-0.665-1.168-2.368-1.759-4.581-1.759  c-8.854,0.163-9.922,6.686-7.981,14.156c-0.345,0.21-0.913,0.878-0.771,2.065c0.266,2.211,1.17,2.771,1.744,2.818  c0.22,2.062,1.58,4.505,2.312,4.888c0,1.473,0.055,2.598-0.091,4.21c-1.261,3.39-7.737,3.655-11.473,6.924  c3.906,3.933,10.236,6.746,16.916,6.746s14.532-5.274,15.839-6.713C37.688,39.186,31.197,38.93,29.933,35.528z"
                  />
                </svg>
              </div>
            </div>
              @auth
            <ul
              id="user_info_container"

              class="z-20 menu p-2 shadow shadow-white bg-black rounded-box w-52 mt-2 absolute top-12 right-0 hidden"
            >
              <li><a>View Profile</a></li>
              <li><a>Bookmark</a></li>
              <li><a>Helpdesk</a></li>
              <li><a>Settings</a></li>
              <li>
                <a>
                  Logout
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                  >
                    <path
                      d="M9 3H5C4.46957 3 3.96086 3.21071 3.58579 3.58579C3.21071 3.96086 3 4.46957 3 5V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H9"
                      stroke="#E855DE"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    ></path>
                    <path
                      d="M14 17L9 12L14 7"
                      stroke="#E855DE"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    ></path>
                    <path
                      d="M9 12H21"
                      stroke="#E855DE"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    ></path>
                  </svg>
                </a>
              </li>
            </ul>
              @endauth
          </div>
        </div>
        <div role="tablist" class="tabs tabs-boxed bg-transparent p-0">
          <input
            type="radio"
            name="my_tabs_2"
            role="tab"
            class="tab text-white text-left py-2 h-auto min-w-[130px] checked:!bg-[#bdb1ff] checked:!text-black"
            aria-label="Basic Mode"
            checked
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
              <p class="text-sm text-[#9b9b9b] mt-2">
                Rewrites AI-generated outputs (or any text for that matter) and
                improves it's readability for humans.
              </p>
            </div>
            <div>
              <div
                class="border border-[#1b1b1d] rounded-3xl px-3 sm:px-6 py-5 sm:py-8 mt-2"
              >
                <div
                  class="transition-all flex justify-between items-center backdrop-blur-md text-white bg-[#ffffff05]
                   hover:bg-[#ffffff0a] border border-[#ffffff0f] hover:border-[#ffffff33] rounded-md px-4 cursor-pointer "
                >
                <textarea type="text"
                wire:model="generateData"
                class="text-xs bg-transparent outline-0 w-full py-3 placeholder:text-white"
                placeholder="Paste AI Generated Content Here ↓"
                id="past_ai_field" cols="30" rows="10"></textarea>
                  <!-- <p class="text-xs">Paste AI Generated Content Here ↓</p> -->
                  {{-- <textarea
                    type="text"
                    wire:model="generateData"
                    class="text-xs bg-transparent outline-0 w-full py-3 placeholder:text-white"
                    placeholder="Paste AI Generated Content Here ↓"
                    id="past_ai_field"
                  /> --}}
                  {{-- <div wire:click="submitData">
                    <svg
                      width="16"
                      height="16"
                      viewBox="0 0 16 16"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M14.4999 7.99323C14.5004 8.1714 14.4532 8.34645 14.3633 8.50029C14.2735 8.65412 14.1441 8.78115 13.9887 8.86823L3.49429 14.8689C3.34351 14.9544 3.17325 14.9996 2.99992 15.0001C2.84007 14.9998 2.68263 14.9611 2.5408 14.8874C2.39896 14.8137 2.27687 14.7071 2.18474 14.5764C2.09262 14.4458 2.03315 14.295 2.01132 14.1367C1.98949 13.9783 2.00594 13.817 2.05929 13.6664L3.76867 8.66948C3.78551 8.62004 3.81741 8.57712 3.8599 8.54674C3.90238 8.51637 3.95331 8.50006 4.00554 8.5001H8.49992C8.56846 8.50026 8.6363 8.48631 8.69923 8.45914C8.76216 8.43196 8.81883 8.39214 8.86572 8.34215C8.91261 8.29215 8.94872 8.23305 8.9718 8.16851C8.99489 8.10397 9.00446 8.03537 8.99992 7.96698C8.98858 7.83841 8.92909 7.71886 8.83336 7.63229C8.73763 7.54572 8.61273 7.4985 8.48367 7.5001H4.00992C3.95777 7.5002 3.90689 7.48398 3.86442 7.45372C3.82194 7.42346 3.78999 7.38068 3.77304 7.33136L2.05804 2.33136C1.99126 2.13976 1.98433 1.93239 2.03819 1.73676C2.09205 1.54114 2.20413 1.36653 2.35957 1.23612C2.51501 1.1057 2.70644 1.02566 2.90845 1.00661C3.11045 0.987567 3.31347 1.03042 3.49054 1.12948L13.9905 7.1226C14.145 7.20956 14.2735 7.33601 14.363 7.48899C14.4525 7.64197 14.4998 7.81599 14.4999 7.99323Z"
                        fill="currentColor"
                      ></path>
                    </svg>
                  </div> --}}
                </div>
                <div class="flex justify-between items-center mt-8 sm:mt-14">
                  <div class="text-xs text-[#858585] flex items-center gap-2">
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
                    <p>Basic mode is not recommended for SEO</p>
                  </div>
                  <a
                  wire:click="submitData"
                    class="bg-[#ffffff1f] bg-gradient-to-r from-[#ffffff14] to-[#8e78b014] border border-[#ffffff0f] rounded-3xl px-4 py-1.5 shadow-[inset_0_0.75px_0.75px_rgba(255,255,255,0.16)] font-medium text-white text-xs"
                  >
                    Humanize
                  </a>
                </div>
              </div>
              <div>
                <div
                  class="border border-[#1b1b1d] rounded-3xl px-3 sm:px-5 py-5 sm:py-10 mt-4 sm:mt-6 flex flex-col gap-10"
                >
                  <div class="flex flex-col gap-8 sm:gap-12">

                    <progress class="progress w-100" wire:loading wire:target="submitData"></progress>

                    @if($generateResult)
                    <div
                      class="transition-all backdrop-blur-md text-white bg-[#ffffff05] hover:bg-[#ffffff0a]
                       border border-[#ffffff0f] hover:border-[#ffffff33]
                        border border-[#66666647] p-5 rounded-[20px] text-black text-base focus:outline focus:outline-[#ffffff47]"
                      style="background: #202020"
                    >
                      <span class="text-xs text-[#d6d6d6]">Humanized Text</span>
                      <p
                        id="copy_text_content"
                        class="text-base text-[#8f8f8f]"
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
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

          <input
            type="radio"
            name="my_tabs_2"
            role="tab"
            class="tab text-white text-left py-2 h-auto min-w-[150px] checked:!bg-[#bdb1ff] checked:!text-black"
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
      </section>
    </main>
</div>
