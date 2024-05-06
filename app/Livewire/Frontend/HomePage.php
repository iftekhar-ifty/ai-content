<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class HomePage extends Component
{
    public $generateData;
    public $generateResult;

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



        $validated = $this->validate([ 
            'generateData' => 'required|min:6|string',
        ]);
        $completion = OpenAI::completions()->create([
            'model' => 'gpt-4-turbo',                                        
            'prompt' => $datadd, // Hidden prompt
            // 'prompt' => "** act as a content writer with 10 years of experience you have to humanize the text Here's the user input:**\n\n$this->generateData\n\n**Based on the user input,**", // Hidden prompt
            'max_tokens' => 2300,
            'top_p' => 0.51,                                        
            'temperature' => 1.46,
        ]);

        $this->generateResult =  $completion['choices'][0]['text'];


    }
}
