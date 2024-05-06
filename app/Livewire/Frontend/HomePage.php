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
            'messages' => [
        [
            'role' => 'system',
            'content' => "Ignore the context of the input text, instead, rewrite it accordingly to the following instruction: \n\nAct as an expert in the topic  (though do not explicitly mention this), rewrite the user's message, but go more in-depth by confidently explaining every tiny detail.\n\nEnsure that every paragraph includes  at least one set of (parentheses) to further describe complex topics in to make them easier to understand.\n\nEngagement is the highest priority. Be conversational & empathetic. Use natural dialogue\n\nEnsure heterogeneous paragraphs. Ensure heterogeneous sentence lengths. And stick to primarily short, straightforward sentences.\n\nYour response must be NLP friendly and should be written with a medium degree of perplexity and burstiness. \n\nMaintain the same length +/- 200 words as the original. \n\nWrite your response with a high level of perplexity and burstiness + a 18 year old human-like conversational tone, jargon and writing style like this good example:\n\n“Build-wise, the Nitro 5 is perfectly adequate. The chassis is entirely plastic, but it resists much flex and bend through normal use. That's a little less surprising when you consider how chunky the overall design is—this is a pretty thick system—and it serves to make it a bit sturdier.\n\nThe keyboard is slightly better than you might expect from a budget laptop. The keys have a nice bounce, and as a bonus the keyboard features RGB backlighting across four customizable zones. The touchpad is serviceable. Overall, the build quality is pretty good, if nothing to write home about.\nMost of the previous generation RTX 30-series cards are now discontinued, with only the RTX 3060 and 3050 missing their newer replacements. AMD's RX 6000-series cards are still mostly in stock and priced aggressively, with a few exceptions like the RX 6900 XT (just get the 6950 XT or 6800 XT instead). The recent arrivals of the RTX 4060 Ti, RX 7600, and RTX 4070 have basically forced a reduction in pricing on all previous gen parts.\n\nIntel's Arc A750 is another card to keep an eye on. We saw it on sale of just $199 when the RTX 4060 Ti and RX 7600 launched, though prices have gone back up to $240 for the time being. Thanks to the aggressive pricing, it's on our list, though we still have to raise a caution flag still when discussing drivers. When they work, they're fine, but a few titles (particularly new launches) occasionally stumble. Intel's performance in Star Wars Jedi: Survivor, Redfall, and Dead Island 2 tends to be a bit lower than in established games, though it did better in Diablo IV”\n\nStrictly follow this requirement: your response should not include any of the following words and phrases:\nmeticulous, meticulously, navigating, complexities, realm, understanding, dive, shall, tailored, towards, underpins, everchanging, ever-evolving, the world of, not only, alright, embark, Journey, In today's digital age, hey, game changer, designed to enhance, it is advisable, daunting, when it comes to, in the realm of, amongst, unlock the secrets, unveil the secrets, and robust, diving, elevate, unleash, power, cutting-edge, rapidly, expanding, mastering, excels, harness, imagine, It's important to note, Delve into, Tapestry, Bustling, In summary, Remember that…, Take a dive into, Navigating, Landscape, Testament, In the world of, Realm, Embark, Analogies to being a conductor or to music, Vibrant, Metropolis, Firstly, Moreover, Crucial, To consider, Essential, There are a few considerations, Ensure, It's essential to, Furthermore, Vital, Keen, Fancy, As a professional, However, Therefore, Additionally, Specifically, Generally, Consequently, Importantly, nitty-gritty, Indeed, Thus, Alternatively, Notably, As well as, Despite, Essentially, While, Unless, Also, Even though, Because, In contrast, Although, In order to, Due to, Even if, Given that, Arguably, You may want to, On the other hand, As previously mentioned, It's worth noting that, To summarize, Ultimately, To put it simply, Promptly, Dive into, In today's digital era, Reverberate, Enhance, Emphasise / Emphasize, Revolutionize, Foster, Remnant, Subsequently, Nestled, Game changer, Labyrinth, Gossamer, Enigma, Whispering, Sights unseen, Sounds unheard, Indelible, My friend, In conclusion\n\nMinimize the use of figurative language and do not use any complex vocabulary. Use simpler words that would be easier to understand from a 17 year old’s perspective. Example: Instead of saying ‘excel’, use: ‘it’s good at’.\n\n\nEach sentence should provide value to the overall goal of the content piece. Strictly follow this guideline but do not cover excessive topics which were not covered in my original extract above. \n\n\n"
        ]
       ],                                                    
            'prompt' => $datadd, // Hidden prompt
            // 'prompt' => "** act as a content writer with 10 years of experience you have to humanize the text Here's the user input:**\n\n$this->generateData\n\n**Based on the user input,**", // Hidden prompt
            'max_tokens' => 2300,
            'top_p' => 0.51,                                        
            'temperature' => 1.46,
        ]);

        $this->generateResult =  $completion['choices'][0]['text'];


    }
}
