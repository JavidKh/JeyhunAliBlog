<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\FileController;
use App\Http\Controllers\Helpers\FileV2Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainPageController extends Controller
{
    public function get() {
        try {
            $data = (object)[];
            $data->slider = $this->getSlider();
            $data->about_me = $this->getAboutMe();
            $data->work_history = $this->getWorkHistory();
            $data->events = $this->getEvents();
            $data->offers = $this->getOffers();
            $data->photo_galery = $this->getPhotoGallery();
            $data->youtube_channel = $this->getYoutube();
            $data->instagram = $this->getInstagram();
            $data->contatc = $this->getContact();
            $data->links = $this->getLinks();

            return parent::asJson($data);
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getSlider() {
        try {
            $slider = DB::table('slider')->get();
            foreach ($slider as $photo) {
                $photo->photo = FileV2Controller::generateUrl('slider', 'photo', $photo->slug);
            }
            return $slider;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getAboutMe() {
        try {
            $about_me = DB::table('about_me')->first();
            $about_me->photo = FileV2Controller::generateUrl('about-me', 'photo', $about_me->slug);
            return $about_me;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getWorkHistory() {
        try {
            $work_history = DB::table('work_history')->get();

            return $work_history;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getEvents() {
        try {
            $events = DB::table('events')->get();
            foreach ($events as $event) {
                $event->photo = FileController::generateUrl('events', $event->id, 'photo', $event->slug);
            }
            return $events;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getOffers() {
        try {
            $offers = DB::table('offers')->get();

            return $offers;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getPhotoGallery() {
        try {
            $gallery = DB::table('photo_gallery')->get();

            foreach ($gallery as $photo) {
                $photo->photo = FileV2Controller::generateUrl('photo-gallery', 'photo', $photo->slug);
            }
            return $gallery;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getYoutube() {
        try {
            $youtube = DB::table('youtube_channel')->get();

            return $youtube;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getInstagram() {
        try {
            $instagram = DB::table('instagram')->get();

            return $instagram;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getContact() {
        try {
            $contact = DB::table('contact')->get();

            return $contact;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    public function getLinks() {
        try {
            $links = DB::table('links')->get();

            return $links;
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }
}
