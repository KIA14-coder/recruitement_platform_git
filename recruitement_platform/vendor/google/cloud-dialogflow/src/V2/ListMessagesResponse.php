<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/conversation.proto

namespace Google\Cloud\Dialogflow\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The response message for
 * [Conversations.ListMessages][google.cloud.dialogflow.v2.Conversations.ListMessages].
 *
 * Generated from protobuf message <code>google.cloud.dialogflow.v2.ListMessagesResponse</code>
 */
class ListMessagesResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The list of messages. There will be a maximum number of items
     * returned based on the page_size field in the request.
     * `messages` is sorted by `create_time` in descending order.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dialogflow.v2.Message messages = 1;</code>
     */
    private $messages;
    /**
     * Token to retrieve the next page of results, or empty if there are
     * no more results in the list.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    protected $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Cloud\Dialogflow\V2\Message>|\Google\Protobuf\Internal\RepeatedField $messages
     *           The list of messages. There will be a maximum number of items
     *           returned based on the page_size field in the request.
     *           `messages` is sorted by `create_time` in descending order.
     *     @type string $next_page_token
     *           Token to retrieve the next page of results, or empty if there are
     *           no more results in the list.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dialogflow\V2\Conversation::initOnce();
        parent::__construct($data);
    }

    /**
     * The list of messages. There will be a maximum number of items
     * returned based on the page_size field in the request.
     * `messages` is sorted by `create_time` in descending order.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dialogflow.v2.Message messages = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * The list of messages. There will be a maximum number of items
     * returned based on the page_size field in the request.
     * `messages` is sorted by `create_time` in descending order.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dialogflow.v2.Message messages = 1;</code>
     * @param array<\Google\Cloud\Dialogflow\V2\Message>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMessages($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dialogflow\V2\Message::class);
        $this->messages = $arr;

        return $this;
    }

    /**
     * Token to retrieve the next page of results, or empty if there are
     * no more results in the list.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * Token to retrieve the next page of results, or empty if there are
     * no more results in the list.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

