<div class="gembas-details-item gembas-question-details  w-100">
    Questions
    @foreach (unserialize($gemba->formMeta('questions')) as $question)
        <div class="Questions-lists">
            <ul>
                <li> <label>Question label:</label>
                    <span>{{ @$question['label'] }}</span>
                </li>                                       
                <li> <label>Comment</label>
                    <span>{{ @$question['comment'] }}</span>
                </li>
            </ul>
        </div>
    @endforeach    
</div>