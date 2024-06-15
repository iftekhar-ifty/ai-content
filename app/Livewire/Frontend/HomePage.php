<?php

namespace App\Livewire\Frontend;

use App\Models\History;
use App\Models\UserPlan;
use Http\Discovery\Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class HomePage extends Component
{
    public $generateData;
    public $generateResult;
    public $checkLimitExpire = false;
    public $userWordLeft = 0;

    public $activeUserPlan;

    public function mount()
    {

        if (auth()->user()->type == 'admin'){
           return $this->redirect('/admin/dashboard');
        }
        $this->activeUserPlan = UserPlan::query()->where('user_id', auth()->id())->whereNull('cancelled_at')->first();
        
        // dd($this->activeUserPlan);
        $this->userWordLeft = $this->activeUserPlan->word_limit;



    }

    public function goToLogin()
    {
        $this->redirect('/login');
    }
    public function render()
    {
        return view('livewire.frontend.home-page');
    }


    public function submitData()
    {

//        Crypt::encrypt()


        $datadd = "
        **  Rewrite the above with the following requirements:

Every 200 words should include at least one set of parentheses to further describe something.


Each sentence should provide value to the overall goal of the content piece. Strictly follow this guideline but do not cover excessive topics which were not covered in my original extract above.

Engagement is the highest priority. Be conversational & empathetic. Use natural dialogue

Ensure heterogeneous paragraphs. Ensure heterogeneous sentence lengths. And stick to primarily short, straightforward sentences.

Your response must be NLP friendly and should be written with a medium degree of perplexity and burstiness.

Maintain the same length +/- 200 words as the original.

Write your response with a high level of perplexity and burstiness + a similar tone, jargon and writing style like this good example:

**\n\n$this->generateData\n\n**



** Strictly follow this requirement: your response should not include any of the following words and phrases:
meticulous, meticulously, navigating, complexities, realm, understanding, dive, shall, tailored, towards, underpins, everchanging, ever-evolving, the world of, not only, alright, embark, Journey, In today's digital age, hey, game changer, designed to enhance, it is advisable, daunting, when it comes to, in the realm of, amongst, unlock the secrets, unveil the secrets, and robust, diving, elevate, unleash, power, cutting-edge, rapidly, expanding, mastering, excels, harness, imagine, It's important to note, Delve into, Tapestry, Bustling, In summary, Remember that…, Take a dive into, Navigating, Landscape, Testament, In the world of, Realm, Embark, Analogies to being a conductor or to music, Vibrant, Metropolis, Firstly, Moreover, Crucial, To consider, Essential, There are a few considerations, Ensure, It's essential to, Furthermore, Vital, Keen, Fancy, As a professional, However, Therefore, Additionally, Specifically, Generally, Consequently, Importantly, nitty-gritty, Indeed, Thus, Alternatively, Notably, As well as, Despite, Essentially, While, Unless, Also, Even though, Because, In contrast, Although, In order to, Due to, Even if, Given that, Arguably, You may want to, On the other hand, As previously mentioned, It's worth noting that, To summarize, Ultimately, To put it simply, Promptly, Dive into, In today's digital era, Reverberate, Enhance, Emphasise / Emphasize, Revolutionize, Foster, Remnant, Subsequently, Nestled, Game changer, Labyrinth, Gossamer, Enigma, Whispering, Sights unseen, Sounds unheard, Indelible, My friend, In conclusion

Do not use any complex vocabulary. Use simpler words that would be easier to understand from a 17 year old’s perspective. Example: Instead of saying ‘excel’, use: ‘it’s good at’**



         ";

//        $pp = 'Human-written & paraphrased '


       $validated = $this->validate([
                        'generateData' => 'required|min:70|max:3000|string',
                    ], [
                        'generateData.required' => 'This field is mandatory.',
                        'generateData.min' => 'The text must be at least 70 characters.',
                        'generateData.max' => 'The text must not exceed 3000 characters.',
                        'generateData.string' => 'The text must be a string.',
                    ]);
        
        
        $wordCount = str_word_count($this->generateData);


        if($wordCount > $this->userWordLeft){
            $this->checkLimitExpire = true;
            return;
        }


        $maxTokenUse = ceil($wordCount * 1.33);

        $completion = OpenAI::chat()->create([
            'model' => 'gpt-4-turbo',
            'messages' => [
                [
                    'role' => 'system',
                                        'content' => "Rewrite the user’s input text, with the following requirements:\nVaried Sentences: Mix short, concise sentences with longer, more detailed ones to create a natural flow. This variation mimics the rhythm of natural speech and keeps the reader engaged. \nBurstiness refers to the variation in sentence lengths and structures, creating a dynamic and engaging rhythm. High perplexity involves diverse vocabulary and intricate sentence patterns, while high burstiness blends short, impactful sentences with longer, detailed ones. Both elements enhance the readability and interest of the text, making it more captivating for the reader. That said, your response must be written with a very high degree of perplexity and burstiness.\nHere is a good example of sentences with a high degree of perplexity and burstiness.: \n“Copywriting doesn’t have to be a guessing game. And you shouldn’t have to run through your annual marketing budget testing “shot-in-the-dark” copy. No matter how many character personas you create, you will never be able to replicate the many complex nuances of a real-life prospect. Instead, invest time and effort in deep, strategic research to set your copy up for long-lasting success. Spend time reviewing/reddit mining, interviewing customers, and setting up on-site surveys. The rich, qualitative data you get from this kind of research will literally write your copy for you. (And it’ll be as authentic, persuasive, and high-converting as it gets!)”\nEngagement is the highest priority. Be conversational & empathetic. Use natural dialogue. For example, Phrases like “we all want” create a sense of community and shared experience, so employ human-like phrases  that sound natural, as if speaking directly to the reader in a formal tone. For example, phrases like “it’s as simple as” or “you might find this interesting” sound conversational to the reader. Use this type of language throughout but remain professional. \nStrictly follow this requirement: your response should not include any of the following words and phrases:\nmeticulous, meticulously, navigating, complexities, realm, understanding, dive, shall, tailored, towards, underpins, everchanging, ever-evolving, the world of, not only, alright, embark, Journey, In today's digital age, hey, game changer, designed to enhance, it is advisable, daunting, when it comes to, in the realm of, amongst, unlock the secrets, unveil the secrets, and robust, diving, elevate, unleash, power, cutting-edge, rapidly, expanding, mastering, excels, harness, imagine, It's important to note, Delve into, Tapestry, Bustling, In summary, Remember that…, Take a dive into, Navigating, Landscape, Testament, In the world of, Realm, Embark, Analogies to being a conductor or to music, Vibrant, Metropolis, Firstly, Moreover, Crucial, To consider, Essential, There are a few considerations, Ensure, It's essential to, Furthermore, Vital, Keen, Fancy, As a professional, However, Therefore, Additionally, Specifically, Generally, Consequently, Importantly, nitty-gritty, Indeed, Thus, Alternatively, Notably, As well as, Despite, Essentially, While, Unless, Also, Even though, Because, In contrast, Although, In order to, Due to, Even if, Given that, Arguably, You may want to, On the other hand, As previously mentioned, It's worth noting that, To summarize, Ultimately, To put it simply, Promptly, Dive into, In today's digital era, Reverberate, Enhance, Emphasise / Emphasize, Revolutionize, Foster, Remnant, Subsequently, Nestled, Game changer, Labyrinth, Gossamer, Enigma, Whispering, Sights unseen, Sounds unheard, Indelible, My friend, In conclusion\nDo not use any complex vocabulary. Employ informal language and expressions like “pretty straightforward” or “just let it be” to make the text feel approachable and friendly but still remain professional and formal.\nEvery 200 words should include at least one set of parentheses to further describe something. maintain the same output length as the user input.",

                ],
                [
                    'role' => 'user',
                    'content' => $this->generateData
                ]
            ],
            // 'max_tokens' => $maxTokenUse,
            // 'top_p' => 0.51,
            // 'temperature' => 1.46,
            'temperature' => 1.94,
            'max_tokens' => 1006,
            'top_p' => 0.93,
            'frequency_penalty' => 1.89,
            'presence_penalty' => 0,
        ]);

        $gpt_data = [
            'user_id' => auth()->id(),
            'gpt_id' => $completion['id'],
            'object' => $completion['object'],
            'created' => $completion['created'],
            'model' => $completion['model'],
            'text' => $completion['choices'][0]['message']['content'],
            'word_count' => $wordCount,
        ];


        try {
            History::query()->create($gpt_data);

            $userPlan = UserPlan::query()->where('user_id', auth()->id())->whereNull('cancelled_at')->first();

            if($userPlan){
                $userPlan->decrement('word_limit', $wordCount);
            }




        }catch (Exception $e){
            info('error', $e);
        }



        $this->generateResult =  $completion['choices'][0]['message']['content'];


    }
}
