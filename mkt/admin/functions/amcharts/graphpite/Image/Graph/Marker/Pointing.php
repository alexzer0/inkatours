<?php
// +--------------------------------------------------------------------------+
// | Image_Graph aka GraPHPite                                                |
// +--------------------------------------------------------------------------+
// | Copyright (C) 2003, 2004 Jesper Veggerby Hansen                          |
// | Email         pear.nosey@veggerby.dk                                |
// | Web           http://graphpite.sourceforge.net                           |
// | PEAR          http://pear.php.net/pepr/pepr-proposal-show.php?id=145     |
// +--------------------------------------------------------------------------+
// | This library is free software; you can redistribute it and/or            |
// | modify it under the terms of the GNU Lesser General Public               |
// | License as published by the Free Software Foundation; either             |
// | version 2.1 of the License, or (at your option) any later version.       |
// |                                                                          |
// | This library is distributed in the hope that it will be useful,          |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU        |
// | Lesser General Public License for more details.                          |
// |                                                                          |
// | You should have received a copy of the GNU Lesser General Public         |
// | License along with this library; if not, write to the Free Software      |
// | Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA |
// +--------------------------------------------------------------------------+

/**
 * Image_Graph aka GraPHPite - PEAR PHP OO Graph Rendering Utility.
 * @package marker
 * @copyright Copyright (C) 2003, 2004 Jesper Veggerby Hansen
 * @license http://www.gnu.org/licenses/lgpl.txt GNU Lesser General Public License
 * @author Jesper Veggerby Hansen <pear.nosey@veggerby.dk>
 * @version $Id: Pointing.php,v 1.1 2008/01/24 01:06:07 tye Exp $
 */ 

/**
 * Include file Graph/Marker.php
 */
require_once(IMAGE_GRAPH_PATH . "/Graph/Marker.php");

/**
 * Data marker as a "pointing marker", ie it points to the data using another marker (as start and/or end) 
 */
class Image_Graph_Marker_Pointing extends Image_Graph_Marker 
{

    /**
     * The starting marker
     * @var Marker
     * @access private
     */
    var $_markerStart;

    /**
     * The ending marker
     * @var Marker
     * @access private
     */
    var $_markerEnd;

    /**
     * The X offset from the "data"
     * @var int
     * @access private
     */
    var $_deltaX = -1;

    /**
     * The Y offset from the "data"
     * @var int
     * @access private
     */
    var $_deltaY = -1;

    /**
     * Create an pointing marker, ie a pin on a board
     * @param int $deltaX The the X offset from the real "data" point
     * @param int $deltaY The the Y offset from the real "data" point
     * @param Marker $markerEnd The ending marker that represents "the head of the pin"
     */
    function &Image_Graph_Marker_Pointing($deltaX, $deltaY, & $markerEnd)
    {
        parent::Image_Graph_Marker();
        $this->_deltaX = $deltaX;
        $this->_deltaY = $deltaY;
        $this->_markerStart = null;
        $this->_markerEnd = & $markerEnd;
        $this->_markerEnd->_setParent($this);
    }

    /**
     * Sets the starting marker, ie the tip of the pin on a board
     * @param Marker $markerStart The starting marker that represents "the tip of the pin"
     */
    function setMarkerStart(& $markerStart)
    {
        $this->_markerStart = & $markerStart;
        $this->_markerStart->_setParent($this);
    }

    /**
     * Draw the marker on the canvas
     * @param int $x The X (horizontal) position (in pixels) of the marker on the canvas 
     * @param int $y The Y (vertical) position (in pixels) of the marker on the canvas 
     * @param array $values The values representing the data the marker "points" to 
     * @access private
     */
    function _drawMarker($x, $y, $values = false)
    {
        parent::_drawMarker($x, $y, $values);
        if ($this->_markerStart) {
            $this->_markerStart->_drawMarker($x, $y, $values);
        }
        // Modified: Don't draw pointer if line thickness is zero
        if ($this->_getLineStyle() != 0) ImageLine($this->_canvas(), $x, $y, $x + $this->_deltaX, $y + $this->_deltaY, $this->_getLineStyle());
        $this->_markerEnd->_drawMarker($x + $this->_deltaX, $y + $this->_deltaY, $values);
    }

}

?>