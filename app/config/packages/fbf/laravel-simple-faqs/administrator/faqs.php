<?php

return array(

    /**
     * Model title
     *
     * @type string
     */
    'title' => 'FAQs',

    /**
     * The singular name of your model
     *
     * @type string
     */
    'single' => 'faq',

    /**
     * The class name of the Eloquent model that this config represents
     *
     * @type string
     */
    'model' => 'Fbf\LaravelSimpleFaqs\Faq',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(
        'question' => array(
            'title' => 'Question'
        ),
        'order' => array(
            'title' => 'Order'
        ),
        'status' => array(
            'title' => 'Status'
        ),
        'updated_at' => array(
            'title' => 'Last Updated'
        ),
    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        'question' => array(
            'title' => 'Question',
            'type' => 'text',
        ),
        'slug' => array(
            'title' => 'Slug',
            'type' => 'text',
            'visible' => function ($model) {
                    return $model->exists;
                },
        ),
        'answer' => array(
            'title' => 'Answer',
            'type' => 'wysiwyg',
        ),
        'status' => array(
            'type' => 'enum',
            'title' => 'Status',
            'options' => array(
                Fbf\LaravelSimpleFaqs\Faq::DRAFT => 'Draft',
                Fbf\LaravelSimpleFaqs\Faq::APPROVED => 'Approved',
            ),
        ),
        'created_at' => array(
            'title' => 'Created',
            'type' => 'datetime',
            'editable' => false,
        ),
        'updated_at' => array(
            'title' => 'Updated',
            'type' => 'datetime',
            'editable' => false,
        ),
    ),

    /**
     * The filter fields
     *
     * @type array
     */
    'filters' => array(
        'question' => array(
            'type' => 'text',
            'title' => 'Question',
        ),
        'answer' => array(
            'type' => 'text',
            'title' => 'Answer',
        ),
        'status' => array(
            'type' => 'enum',
            'title' => 'Status',
            'options' => array(
                Fbf\LaravelSimpleFaqs\Faq::DRAFT => 'Draft',
                Fbf\LaravelSimpleFaqs\Faq::APPROVED => 'Approved',
            ),
        ),
    ),

    /**
     * The width of the model's edit form
     *
     * @type int
     */
    'form_width' => 500,

    /**
     * The sort options for a model
     *
     * @type array
     */
    'sort' => array(
        'field' => 'order',
        'direction' => 'asc',
    ),

    /**
     * If provided, this is run to construct the front-end link for your model
     *
     * @type function
     */
    'link' => function ($model) {
            return URL::to(Config::get('laravel-simple-faqs::uri') . '#' . $model->slug);
        },

);