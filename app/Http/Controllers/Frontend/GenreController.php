<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-30
 * Time: 10:08
 */

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use View;
use App\Models\Genre;
use App\Models\Song;
use App\Models\Album;
use App\Models\Playlist;
use App\Models\Artist;
use App\Models\Slide;
use App\Models\Channel;
use MetaTag;
use Spotify;
use SpotifySeed;

class GenreController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    private function getGenre(){
        $genre = Genre::where('alt_name',  $this->request->route('slug'))->firstOrFail();
        $subcategory = Genre::where('main_cat_id',  $genre->id)->where('sub_cat_id',0)->get()->toArray();
        
        $finalarray = $subgenres = array();
        if(!empty($subcategory)){
            foreach($subcategory as $key => $maingenr){
                $child = Genre::where('main_cat_id', $genre->id)->where('sub_cat_id',$maingenr['id'])->get()->toArray();
                $sub['id'] = $maingenr['id'];
                $sub['parent_id'] = $maingenr['parent_id'];
                $sub['priority'] = $maingenr['priority'];
                $sub['main_cat_id'] = $maingenr['main_cat_id'];
                $sub['sub_cat_id'] = $maingenr['sub_cat_id'];
                $sub['name'] = $maingenr['name'];
                $sub['alt_name'] = $maingenr['alt_name'];
                $sub['type'] = $maingenr['type'];
                $sub['artwork_url'] = $maingenr['artwork_url'];
                $sub['permalink_url'] = $maingenr['permalink_url'];
                $sub['type'] = $maingenr['type'];
                $sub['child'] = $child;
                $finalarray[] = $sub;

            }

            
        }
        $genre['subcategory'] = $finalarray;
        //echo "<pre>"; print_r($genre['subcategory']); die;
        //echo "<pre>"; print_r($subcategory); die;
        //echo "<pre>"; print_r($child); die;
       //echo $genre['subcategory']; die;
        
        /** set metatags for genre section */
        MetaTag::set('title', $genre->meta_title ? $genre->meta_title : $genre->name);
        MetaTag::set('description', $genre->meta_description ? $genre->meta_description : $genre->description);
        MetaTag::set('keywords', $genre->meta_keywords);
        MetaTag::set('image', $genre->artwork);

        return $genre;
    }

    public function index()
    {
        $genre = $this->getGenre();

        if(config('settings.automate') && ! $this->request->is('api*')) {
            if (intval($this->request->input('page')) < 2) {
                $songs = array();
                $seed = SpotifySeed::setGenres([$genre->alt_name]);
                $data = Spotify::recommendations($seed)->get();
                foreach ($data['tracks'] as $item) {
                    $artists = handleSpotifyArtists($item['album']['artists']);
                    if ($item['album']['album_type'] != 'single') {
                        handleSpotifyAlbum($artists, $item['album']);
                    }
                    $songs[] = handleSpotifySong($item, $artists);
                }
            }
        }

        $channels = Channel::where('genre', 'REGEXP', '(^|,)(' . $genre->id . ')(,|$)')->orderBy('priority', 'asc')->get();
        $slides = Slide::where('genre', 'REGEXP', '(^|,)(' . $genre->id . ')(,|$)')->orderBy('priority', 'asc')->get();

        if(isset($songs) && count($songs)) {
            $genre->songs = $songs;
        } else {
            $genre->songs = Song::where('genre', 'REGEXP', '(^|,)(' . $genre->id . ')(,|$)')->paginate(20);
        }

        if( $this->request->is('api*') )
        {
            return response()->json(array(
                'slides' => json_decode(json_encode($slides)),
                'channels' => json_decode(json_encode($channels)),
                'genre' => $genre,
            ));
        }

        $genre->related = Genre::where('id', '!=',  $genre->id);

        $view = View::make('genre.index')
            ->with('slides', json_decode(json_encode($slides)))
            ->with('channels', json_decode(json_encode($channels)))
            ->with('genre', $genre);

        if($this->request->ajax()) {
            $sections = $view->renderSections();

            if($this->request->input('page') && intval($this->request->input('page')) > 1)
            {
                return $sections['pagination'];
            } else {
                return $sections['content'];
            }
        }

        return $view;
    }

    public function songs()
    {
        $genre = $this->getGenre();
        $songs = Song::where('genre', 'REGEXP', '(^|,)(' . $genre->id . ')(,|$)');

        if( $this->request->is('api*') )
        {
            return response()->json($songs);
        }
    }

    public function albums()
    {
        $genre = $this->getGenre();
        $albums = Album::where('genre', 'REGEXP', '(^|,)(' . $genre->id . ')(,|$)');

        if( $this->request->is('api*') )
        {
            return response()->json($albums);
        }
    }

    public function artists()
    {
        $genre = $this->getGenre();
        $artists = Artist::where('genre', 'REGEXP', '(^|,)(' . $genre->id . ')(,|$)');

        if( $this->request->is('api*') )
        {
            return response()->json($artists);
        }
    }

    public function playlists()
    {
        $genre = $this->getGenre();
        $playlists = Playlist::where('genre', 'REGEXP', '(^|,)(' . $genre->id . ')(,|$)');

        if( $this->request->is('api*') )
        {
            return response()->json($playlists);
        }
    }
}