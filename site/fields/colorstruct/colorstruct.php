<?php

class ColorstructField extends BaseField {

    static public $assets = array(
        'js' => array(
            'colorstructure.js',
            'sweetalert.min.js'
        ),
        'css' => array(
            'structure.css',
            'sweetalert.css'
        )
    );

    public $fields = array();
    public $entry  = null;

    public function fields() {

        $output = array();

        foreach($this->fields as $k => $v) {
            $v['name']  = $k;
            $v['value'] = '{{' . $k . '}}';
            $output[] = $v;
        }

        return $output;

    }

    public function value() {

        if(is_string($this->value)) {
            $this->value = yaml::decode($this->value);
        }

        return $this->value;

    }

    public function result() {
        $result = parent::result();
        $raw    = (array)json_decode($result);
        $data   = array();
        foreach($raw as $key => $row) {
            unset($row->_id);
            unset($row->_csfr);
            $data[$key] = (array)$row;
        }
        return yaml::encode($data);
    }

    public function entry() {
            return "<td>{{nachname}}</td>
                <td>{{vorname}}</td>
                <td class='center'>{{veggie}}</td>
                <td><div class='sonstiges'>{{sonstiges}}</div></td>
                <td class='center'><button type='button' data-structure-id='{{_id}}' class='btn btn-with-icon structure-money-button'>{{geld}}</button></td>
                <td class='center'><button type='button' data-structure-id='{{_id}}' class='btn btn-with-icon structure-zettel-button'>{{zettel}}</button></td>
                <td class='center'>
                    <select class='structure-status-select' data-structure-id='{{_id}}'>
                        <option value='j' {{selected 'j'}}>Jugendleiter</option>
                        <option value='t' {{selected 't'}}>Teilnehmer</option>
                        <option value='a' {{selected 'a'}}>Anwärter</option>
                    </select>
                </tr>";
    }

    public function label() {
        return null;
    }

    public function headline() {
        if(!$this->readonly) {
            $add = new Brick('a');
            $add->html('<i class="icon icon-left fa fa-plus-circle"></i>' . l('fields.structure.add'));
            $add->addClass('structure-add-button label-option');
            $add->attr('#');

        } else {
            $add = null;
        }

        $label = parent::label();
        $label->addClass('structure-label');
        $label->append($add);

        return $label;

    }

    public function content() {
        return tpl::load(__DIR__ . DS . 'template.php', array('field' => $this));
    }

}
