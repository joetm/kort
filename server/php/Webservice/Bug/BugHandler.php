<?php
namespace Webservice\Bug;

use Webservice\RelayHandler;
use Helper\PostGisSqlHelper;

class BugHandler extends RelayHandler
{
    protected $table = 'kort.errors';
    protected $fields = array(
        'id',
        'schema',
        'type',
        'osm_id',
        'osm_type',
        'title',
        'description',
        'latitude',
        'longitude',
        'view_type',
        'answer_placeholder'
    );

    public function getBugsByOwnPosition($lat, $lng, $limit, $radius)
    {
        //TODO: Use the radius and get a fast result
        // $this->where = "ST_DWithin(geom," . PostGisSqlHelper::getLatLngGeom($lat, $lng) . "," . $radius . ")";
        $this->orderBy = "geom <-> " . PostGisSqlHelper::getLatLngGeom($lat, $lng);
        $this->limit = $limit;

        return $this->getFromDb();
    }
}
