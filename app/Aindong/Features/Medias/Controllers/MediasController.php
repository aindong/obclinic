<?php

namespace Aindong\Features\Medias\Controllers;

use Aindong\Features\Medias\Repositories\MediaInterface;

class MediasController extends \BaseController {

    /**
     * @var MediaInterface
     */
    protected $media;

    /**
     * @param MediaInterface $media
     */
    public function __construct(MediaInterface $media) {
        $this->media = $media;
    }

    public function index()
    {

    }

    public function store()
    {
        $file = \Input::file('photo');
        print_r($file);exit;

        $filename = uniqid().'-'.$file->getClientOriginalName();
        $destination = public_path() . '/img/public';

        $data = [
            'name' => $filename
        ];

        $file->move($destination, $filename);

        $result = $this->media->create($data);

        return $result;
    }
}